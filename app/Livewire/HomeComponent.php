<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Article;
use Cart;



class HomeComponent extends Component
{
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\\Models\\Product');
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

    public function render()
    {
        $categories = Category::whereNull('parent_id')->orderBy('position', 'ASC')->get();

        // НОВИНКИ: свежие сверху (по new_until DESC), только активные, максимум 10
        // actualNew() уже гарантирует remark='new' + new_until в будущем
        $remark__new = Product::actualNew()
            ->where('status', 0)
            ->orderBy('new_until', 'desc')
            ->limit(10)
            ->get();

        // АКЦИИ: свежие сверху (по sale_from DESC), товары без даты — в конец,
        // только активные, максимум 10
        $remark__sale = Product::where('remark', 'sale')
            ->where('status', 0)
            ->orderByRaw('sale_from IS NULL')
            ->orderBy('sale_from', 'desc')
            ->limit(10)
            ->get();

        // ХИТЫ: свежие хиты сверху (по дате добавления), только активные, максимум 10
        $remark__hit = Product::where('remark', 'hit')
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $slides = Slider::where('status', 0)->get();
        $articles = Article::where('status', 0)->take(3)->get();

        return view('livewire.home-component', [
            'categories' => $categories,
            'remark__new' => $remark__new,
            'remark__hit' => $remark__hit,
            'remark__sale' => $remark__sale,
            'slides' => $slides,
            'articles' => $articles,
        ])->layout('layouts.base');
    }
}
