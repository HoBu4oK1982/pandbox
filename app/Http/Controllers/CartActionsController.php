<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Cart;

/**
 * Fetch-based cart mutations for the /cart page.
 *
 * These mirror CartComponent's increaseQuantity/decreaseQuantity/destroy/
 * destroyAll methods exactly (same stock checks, same business rules) but
 * return JSON instead of relying on Livewire's dispatch pipeline, which has
 * proven unreliable for triggering toast notifications across this project.
 */
class CartActionsController extends Controller
{
    private function summary(): array
    {
        return [
            'cart_count' => Cart::instance('cart')->count(),
            'cart_subtotal' => (float) Cart::instance('cart')->subtotal(2, '.', ''),
            'cart_total' => (float) Cart::instance('cart')->total(2, '.', ''),
        ];
    }

    public function increase(string $rowId): JsonResponse
    {
        $product = Cart::instance('cart')->get($rowId);

        if ($product === null) {
            return response()->json(['message' => 'Товар уже отсутствует в корзине.'], 404);
        }

        $availableQuantity = (int) Product::whereKey($product->id)->value('qty');

        if ($availableQuantity <= $product->qty) {
            return response()->json([
                'message' => 'Достигнут остаток товара.',
                'prod_qty' => $availableQuantity,
                'prod_qty_cart' => $product->qty,
            ], 422);
        }

        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $item = Cart::instance('cart')->get($rowId);

        return response()->json(array_merge([
            'ok' => true,
            'row_id' => $rowId,
            'qty' => $qty,
            'item_subtotal' => (float) $item->subtotal,
        ], $this->summary()));
    }

    public function decrease(string $rowId): JsonResponse
    {
        $product = Cart::instance('cart')->get($rowId);

        if ($product === null) {
            return response()->json(['message' => 'Товар уже отсутствует в корзине.'], 404);
        }

        $qty = $product->qty - 1;

        if ($qty < 1) {
            return $this->destroy($rowId);
        }

        Cart::instance('cart')->update($rowId, $qty);
        $item = Cart::instance('cart')->get($rowId);

        return response()->json(array_merge([
            'ok' => true,
            'row_id' => $rowId,
            'qty' => $qty,
            'item_subtotal' => (float) $item->subtotal,
        ], $this->summary()));
    }

    public function destroy(string $rowId): JsonResponse
    {
        $item = Cart::instance('cart')->get($rowId);
        $productName = $item?->name ?? 'Товар';
        Cart::instance('cart')->remove($rowId);

        return response()->json(array_merge([
            'ok' => true,
            'row_id' => $rowId,
            'removed' => true,
            'name' => $productName,
        ], $this->summary()));
    }

    public function destroyAll(): JsonResponse
    {
        $hadItems = Cart::instance('cart')->count() > 0;
        Cart::instance('cart')->destroy();

        return response()->json(array_merge([
            'ok' => true,
            'cleared' => true,
            'had_items' => $hadItems,
        ], $this->summary()));
    }

    /**
     * Validate the cart and return a redirect URL for checkout.
     *
     * Mirrors CartComponent::checkout() but returns JSON so the
     * front-end can navigate with Livewire.navigate() for a smooth
     * SPA transition instead of a hard redirect.
     */
    public function checkout(): JsonResponse
    {
        if (Cart::instance('cart')->count() < 1) {
            return response()->json(['message' => 'Корзина пуста.'], 422);
        }

        $items = Cart::instance('cart')->content();
        $productIds = $items->pluck('id')->filter()->unique()->values()->all();

        if ($productIds !== []) {
            $products = Product::query()
                ->whereIn('id', $productIds)
                ->get()
                ->keyBy(fn (Product $product) => (int) $product->id);

            foreach ($items as $item) {
                $product = $products->get((int) $item->id);
                $stock = $product && (int) $product->status === 0 ? max(0, (int) $product->qty) : 0;

                if ($stock < (int) $item->qty) {
                    return response()->json([
                        'message' => $stock > 0
                            ? 'На складе всего '.$stock.' шт. товара «'.($product->title ?? 'Товар').'».'
                            : 'Товар «'.($product->title ?? 'Товар').'» сейчас нет в наличии.',
                    ], 422);
                }
            }
        }

        // Persist checkout totals into the session so CheckoutComponent can
        // pick them up — same logic as CartComponent::setAmountForCheckout().
        session()->put('checkout', [
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'total' => Cart::instance('cart')->total(),
        ]);

        return response()->json([
            'ok' => true,
            'redirect' => route('checkout'),
        ]);
    }
}
