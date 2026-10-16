<?php

namespace App\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CartComponent extends Component
{
    public function increaseQuantity($rowId, $id){
        $product = Cart::instance('cart')->get($rowId);

        if ($product === null) {
            $this->dispatch('cart-error-message', message: 'Товар уже отсутствует в корзине.');
            return;
        }

        try {
            $availableQuantity = Product::whereKey($id)->value('qty');
        } catch (QueryException $exception) {
            if (! $this->isTooManyConnections($exception)) {
                throw $exception;
            }

            $this->reportConnectionExhaustion($exception);
            $this->dispatch('cart-error-message', message: 'Сервер временно перегружен. Повторите действие через несколько секунд.');
            return;
        }
        if ($availableQuantity !== null && $availableQuantity > $product->qty) {
            $qty = $product->qty + 1;
            Cart::instance('cart')->update($rowId, $qty);
            $this->dispatch('refreshComponent')->to('cart-count-component');
            $this->dispatch('cart-values-updated');
        } else {
            $this->dispatch('cart-error', prodQty: (int) $availableQuantity, prodQtyCart: $product->qty );
        }
    }

    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);

        if ($product === null) {
            $this->dispatch('cart-error-message', message: 'Товар уже отсутствует в корзине.');
            return;
        }

        $qty = $product->qty - 1;

        if ($qty < 1) {
            $this->destroy($rowId);
            return;
        }

        Cart::instance('cart')->update($rowId, $qty);
        $this->dispatch('refreshComponent')->to('cart-count-component');
        $this->dispatch('cart-values-updated');
    }

    public function destroy($rowId){
        $item = Cart::instance('cart')->get($rowId);
        $productName = $item?->name ?? 'Товар';
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refreshComponent')->to('cart-count-component');
        $this->dispatch('cart-removed', prodName: $productName);
    }

    public function destroyAll(){
        $hadItems = Cart::instance('cart')->count() > 0;
        Cart::instance('cart')->destroy();
        $this->dispatch('refreshComponent')->to('cart-count-component');
        if ($hadItems) {
            $this->dispatch('cart-cleared');
        }
    }

    public function checkout(){
        $invalidItem = $this->firstInvalidCartItem();
        if ($invalidItem !== null) {
            if (! empty($invalidItem['connection_error'])) {
                $this->dispatch('cart-error-message', message: 'Сервер временно перегружен. Повторите оформление через несколько секунд.');
                return;
            }

            $this->dispatch('cart-error', prodQty: $invalidItem['stock'], prodQtyCart: $invalidItem['requested']);
            return;
        }

        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            // Remember checkout as the destination so login/registration
            // returns the customer to order placement instead of a dashboard.
            return redirect()->guest(route('checkout'));
        }
    }

    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        };
        if(session()->has('coupon')){
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        }else{
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this-> calculateDiscount();
            }
        }
        $this->setAmountForCheckout();

        $cartItems = Cart::instance('cart')->content();
        $productsById = $this->productsForCart($cartItems);
        $hasUnavailableItems = $cartItems->contains(function ($item) use ($productsById) {
            $product = $productsById->get((int) $item->id);

            return ! $product
                || (int) $product->status !== 0
                || (int) $product->qty < (int) $item->qty;
        });

        return view('livewire.cart-component', [
            'cartItems' => $cartItems,
            'productsById' => $productsById,
            'hasUnavailableItems' => $hasUnavailableItems,
        ])->layout('layouts.base');
    }

    private function firstInvalidCartItem(): ?array
    {
        $items = Cart::instance('cart')->content();
        $productIds = $items->pluck('id')->filter()->unique()->values()->all();

        if ($productIds === []) {
            return null;
        }

        try {
            $products = Product::query()
                ->whereIn('id', $productIds)
                ->get()
                ->keyBy(fn (Product $product) => (int) $product->id);
        } catch (QueryException $exception) {
            if (! $this->isTooManyConnections($exception)) {
                throw $exception;
            }

            $this->reportConnectionExhaustion($exception);

            return [
                'stock' => 0,
                'requested' => max(1, (int) $items->sum('qty')),
                'connection_error' => true,
            ];
        }

        foreach ($items as $item) {
            $product = $products->get((int) $item->id);
            $stock = $product && (int) $product->status === 0 ? max(0, (int) $product->qty) : 0;

            if ($stock < (int) $item->qty) {
                return ['stock' => $stock, 'requested' => (int) $item->qty];
            }
        }

        return null;
    }

    /**
     * Load the cart products once for a short period. Livewire can render this
     * component several times during quantity changes, so hitting MySQL on
     * every morph unnecessarily consumes production connections.
     */
    private function productsForCart($cartItems)
    {
        $productIds = $cartItems->pluck('id')
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->sort()
            ->values()
            ->all();

        // Eloquent turns an empty whereIn into "WHERE 0 = 1". Avoid opening a
        // database connection at all when the cart is empty.
        if ($productIds === []) {
            return collect();
        }

        try {
            $cache = Cache::store('file');
            $products = collect();
            $missingIds = [];

            foreach ($productIds as $productId) {
                $cached = $cache->get('cart-product-v2:' . $productId, '__pb_cache_miss__');

                if ($cached === '__pb_cache_miss__') {
                    $missingIds[] = $productId;
                    continue;
                }

                if ($cached === '__pb_product_missing__') {
                    continue;
                }

                if ($cached instanceof Product) {
                    $products->put((int) $cached->id, $cached);
                }
            }

            if ($missingIds !== []) {
                $freshProducts = Product::query()
                    ->select(['id', 'slug', 'title', 'images', 'status', 'qty', 'price', 'sale_price'])
                    ->whereIn('id', $missingIds)
                    ->get()
                    ->keyBy(fn (Product $product) => (int) $product->id);

                foreach ($missingIds as $productId) {
                    $product = $freshProducts->get($productId);
                    $cache->put('cart-product-v2:' . $productId, $product ?: '__pb_product_missing__', 10);
                    if ($product) {
                        $products->put($productId, $product);
                    }
                }
            }

            return $products;
        } catch (QueryException $exception) {
            if (! $this->isTooManyConnections($exception)) {
                throw $exception;
            }

            $this->reportConnectionExhaustion($exception);

            // Do not expose Laravel's exception page to customers while the
            // database server is releasing connections. Items stay visible,
            // but are safely marked unavailable until MySQL responds again.
            return $cartItems->mapWithKeys(function ($item) {
                $product = new Product();
                $product->forceFill([
                    'id' => (int) $item->id,
                    'slug' => '',
                    'title' => (string) $item->name,
                    'images' => '',
                    'status' => 1,
                    'qty' => 0,
                    'price' => (float) $item->price,
                    'sale_price' => null,
                ]);

                return [(int) $item->id => $product];
            });
        }
    }

    private function isTooManyConnections(QueryException $exception): bool
    {
        return (int) ($exception->errorInfo[1] ?? 0) === 1040
            || str_contains($exception->getMessage(), 'Too many connections');
    }

    private function reportConnectionExhaustion(QueryException $exception): void
    {
        try {
            if (Cache::store('file')->add('mysql-too-many-connections-reported', true, 60)) {
                report($exception);
            }
        } catch (\Throwable) {
            // Never replace the recoverable database error with a cache/logging error.
        }
    }
}
