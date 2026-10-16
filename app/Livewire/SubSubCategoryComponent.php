<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class SubSubCategoryComponent extends Component
{
    use WithPagination;

    public $categorySlug;
    public $minValue;
    public $maxValue;

    public $sorting = 'default';
    public $pagesize = 32;

    protected $queryString = [
        'sorting' => ['except' => 'default'],
        'pagesize' => ['except' => 32],
        'minValue' => ['except' => 0],
        'maxValue' => ['except' => 1000000],
    ];

    public function mount($subsubcategory_slug)
    {
        $this->categorySlug = $subsubcategory_slug;
        $category = Category::where('status', 0)->where('slug', $this->categorySlug)->firstOrFail();

        $this->minValue = Product::where('status', 0)->where('category_id', $category->guid)->min('price') ?? 0;
        $this->maxValue = Product::where('status', 0)->where('category_id', $category->guid)->max('price') ?? 1000000;
    }

    public function updatedSorting()
    {
        $this->resetPage();
    }

    public function updatedPagesize()
    {
        $this->resetPage();
    }

    public function updatedMinValue()
    {
        $this->resetPage();
    }

    public function updatedMaxValue()
    {
        $this->resetPage();
    }

    public function updatePriceRange($min, $max): void
    {
        $min = (float) $min;
        $max = (float) $max;

        if ($min > $max) {
            [$min, $max] = [$max, $min];
        }

        $this->minValue = $min;
        $this->maxValue = $max;
        $this->resetPage();
    }

    public function render()
    {
        $category = Category::where('slug', $this->categorySlug)->firstOrFail();

        $query = Product::where('status', 0)->whereHas('category', function ($query) {
            $query->where('slug', $this->categorySlug);
        })->whereBetween('price', [$this->minValue, $this->maxValue]);

        switch ($this->sorting) {
            case 'date':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('title', 'asc');
                break;
        }

        $products = $query->paginate($this->pagesize);

        return view('livewire.sub-sub-category-component', [
            'category' => $category,
            'products' => $products,
        ])->layout('layouts.base');
    }
}
