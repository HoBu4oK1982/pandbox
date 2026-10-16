<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Cart;

class QuickProductActionsController extends Controller
{
    private function product(string $slug): Product
    {
        return Product::query()->where('slug', $slug)->where('status', 0)->firstOrFail();
    }

    public function addToCart(Request $request, string $slug): JsonResponse
    {
        $product = $this->product($slug);
        $existing = Cart::instance('cart')->content()->first(fn ($item) => (string) $item->id === (string) $product->id);
        $alreadyInCart = $existing ? (int) $existing->qty : 0;

        if ((int) $product->qty <= $alreadyInCart) {
            return response()->json([
                'message' => 'Доступное количество товара уже находится в корзине.',
            ], 422);
        }

        $requestedQty = max(1, (int) $request->input('qty', 1));
        $availableToAdd = max(1, (int) $product->qty - $alreadyInCart);
        $addQty = min($requestedQty, $availableToAdd);

        Cart::instance('cart')
            ->add($product->id, $product->title, $addQty, $product->sale_price ?: $product->price)
            ->associate(Product::class);

        return response()->json([
            'ok' => true,
            'name' => $product->title,
            'cart_count' => Cart::instance('cart')->count(),
        ]);
    }

    public function toggleWishlist(string $slug): JsonResponse
    {
        $product = $this->product($slug);
        $existing = Cart::instance('wishlist')->content()->first(fn ($item) => (string) $item->id === (string) $product->id);

        if ($existing) {
            Cart::instance('wishlist')->remove($existing->rowId);
            $active = false;
        } else {
            Cart::instance('wishlist')
                ->add($product->id, $product->title, 1, $product->sale_price ?: $product->price)
                ->associate(Product::class);
            $active = true;
        }

        return response()->json([
            'ok' => true,
            'active' => $active,
            'name' => $product->title,
            'wishlist_count' => Cart::instance('wishlist')->count(),
        ]);
    }
}
