<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;

class ProductDetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug){

        $this->slug = $slug;
        $this->qty = 1;

        // Проверяем что товар существует и активен, иначе 404
        $product = Product::where('slug', $slug)
            ->where('status', 0)
            ->first();

        if (!$product) {
            abort(404);
        }
    }

    public function increaseQuantity(){
        $product = $this->activeProduct();
        $availableToAdd = $this->availableToAdd($product);

        if ((int) $this->qty >= $availableToAdd) {
            $this->qty = max(1, $availableToAdd);
            $this->dispatch('cart-error', prodQty: (int) $product->qty, prodQtyCart: $this->cartQuantity($product->id));
            return;
        }

        $this->qty = (int) $this->qty + 1;
    }

    public function decreaseQuantity(){
        if( $this->qty > 1 ){
            $this->qty--;
        }
    }

    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->dispatch('refreshComponent')->to('wishlist-count-component');
        $this->dispatch('wish-added', prodId: $product_id, prodName: $product_name);
    }

    public function removeFromWishlist ($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id === $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatch('refreshComponent')->to('wishlist-count-component');
                $this->dispatch('wish-deleted', prodId: $witem->id, prodName: $witem->name);
                return;
            }
        }
    }

    public function store($product_id){
        $product = Product::query()
            ->whereKey($product_id)
            ->where('status', 0)
            ->firstOrFail();
        $requestedQuantity = max(1, (int) $this->qty);
        $alreadyInCart = $this->cartQuantity($product->id);
        $availableToAdd = max(0, (int) $product->qty - $alreadyInCart);

        if ($requestedQuantity > $availableToAdd) {
            $this->qty = max(1, $availableToAdd);
            $this->dispatch('cart-error', prodQty: (int) $product->qty, prodQtyCart: $alreadyInCart);
            return;
        }

        Cart::instance('cart')
            ->add($product->id, $product->title, $requestedQuantity, $product->sale_price ?: $product->price)
            ->associate(Product::class);

        $this->qty = 1;
        $this->dispatch('refreshComponent')->to('cart-count-component');
        $this->dispatch('cart-updated', prodId: $product->id, prodName: $product->title);
    }

    private function activeProduct(): Product
    {
        return Product::query()
            ->where('slug', $this->slug)
            ->where('status', 0)
            ->firstOrFail();
    }

    private function cartQuantity(int $productId): int
    {
        $cartItem = Cart::instance('cart')->content()
            ->first(fn ($item) => (string) $item->id === (string) $productId);

        return $cartItem ? (int) $cartItem->qty : 0;
    }

    private function availableToAdd(Product $product): int
    {
        return max(0, (int) $product->qty - $this->cartQuantity($product->id));
    }
    
    public function render()
    {
        // Только активные товары (status=0)
        $product = $this->activeProduct();
        $availableToAdd = $this->availableToAdd($product);

        $related_products = Product::where('status', 0)
            ->where('qty', '>', 0)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('livewire.product-details-component', [
            'product' => $product,
            'availableToAdd' => $availableToAdd,
            'related_products' => $related_products,
        ])->layout('layouts.base');
    }
}
