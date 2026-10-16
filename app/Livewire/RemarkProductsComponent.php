<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

abstract class RemarkProductsComponent extends Component
{
    public string $sorting = 'newest';
    public string $category = '';
    public $priceFrom = null;
    public $priceTo = null;

    abstract protected function remark(): string;
    abstract protected function viewName(): string;
    abstract protected function productVariable(): string;

    public function updated($property = null): void
    {
        $this->dispatch('remark-products-updated');
    }
    public function resetFilters(): void
    {
        $this->reset(['category', 'priceFrom', 'priceTo']);
        $this->sorting = 'newest';
        $this->dispatch('remark-products-updated');
    }

    public function applyFilters(): void
    {
        $this->dispatch('remark-products-updated');
    }

    protected function baseQuery(): Builder
    {
        $query = Product::query()->where('status', 0);
        return $this->remark() === 'new' ? $query->actualNew() : $query->where('remark', $this->remark());
    }

    public function render()
    {
        $base = $this->baseQuery();
        $categoryIds = (clone $base)->whereNotNull('category_id')->distinct()->pluck('category_id');
        $categories = Category::query()->whereIn('guid', $categoryIds)->orderBy('title')->get(['guid', 'title']);
        $bounds = (clone $base)->selectRaw('MIN(COALESCE(sale_price, price)) min_price, MAX(COALESCE(sale_price, price)) max_price')->first();
        $products = $base
            ->when($this->category !== '', fn (Builder $q) => $q->where('category_id', $this->category))
            ->when($this->priceFrom !== null && $this->priceFrom !== '', fn (Builder $q) => $q->whereRaw('COALESCE(sale_price, price) >= ?', [(float) $this->priceFrom]))
            ->when($this->priceTo !== null && $this->priceTo !== '', fn (Builder $q) => $q->whereRaw('COALESCE(sale_price, price) <= ?', [(float) $this->priceTo]));
        match ($this->sorting) {
            'price' => $products->orderByRaw('COALESCE(sale_price, price) ASC'),
            'price-desc' => $products->orderByRaw('COALESCE(sale_price, price) DESC'),
            'title' => $products->orderBy('title'),
            default => $products->latest('id'),
        };
        return view($this->viewName(), [
            $this->productVariable() => $products->get(), 'categories' => $categories,
            'minPrice' => (float) ($bounds->min_price ?? 0), 'maxPrice' => (float) ($bounds->max_price ?? 0),
        ])->layout('layouts.base');
    }
}
