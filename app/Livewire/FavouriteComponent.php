<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class FavouriteComponent extends Component
{
    public function removeFromWishlist ($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if((int) $witem->id === (int) $product_id){
                $productName = $witem->name ?? 'Товар';
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatch('refreshComponent')->to('wishlist-count-component');
                $this->dispatch('wish-deleted', prodName: $productName);
                return;
            }
        }
    }

    public function moveProductFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        $product = Product::query()->whereKey($item->id)->first();
        $cartItem = Cart::instance('cart')->content()
            ->first(fn ($candidate) => (string) $candidate->id === (string) $item->id);
        $alreadyInCart = $cartItem ? (int) $cartItem->qty : 0;
        $stock = $product && (int) $product->status === 0 ? max(0, (int) $product->qty) : 0;

        if ($stock <= $alreadyInCart) {
            $this->dispatch('cart-error', prodQty: $stock, prodQtyCart: $alreadyInCart);
            return;
        }

        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($product->id, $product->title, 1, $product->sale_price ?: $product->price)->associate(Product::class);
        $this->dispatch('refreshComponent')->to('wishlist-count-component'); 
        $this->dispatch('refreshComponent')->to('cart-count-component');
        $this->dispatch('wish-moved-to-cart', prodName: $product->title);
    }
    
    public function render()
    {
        $wishlistItems = Cart::instance('wishlist')->content();
        $productsById = Product::query()
            ->whereIn('id', $wishlistItems->pluck('id')->unique()->all())
            ->get()
            ->keyBy(fn (Product $product) => (int) $product->id);

        return view('livewire.favourite-component', [
            'wishlistItems' => $wishlistItems,
            'productsById' => $productsById,
        ])->layout('layouts.base');
    }
}
