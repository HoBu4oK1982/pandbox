<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class SubCategoryComponent extends Component
{
    use WithPagination;

    public $minValue;
    public $maxValue;
    public $categorySlug;
    public $subcategory_slug;

    public $sorting = 'default';
    public $pagesize = 32;

    protected $queryString = [
        'sorting' => ['except' => 'default'],
        'pagesize' => ['except' => 32],
        'minValue' => ['except' => 0],
        'maxValue' => ['except' => 1000000],
    ];

    public function mount($subcategory_slug)
    {
        $this->categorySlug = $subcategory_slug;
        $category = Category::where('status', 0)->where('slug', $this->categorySlug)->firstOrFail();

        $category_guid = $category->guid;

        // Получаем GUID всех подкатегорий
        $subCategoryGuids = $category->children()->pluck('guid')->toArray();
        $subCategoryGuids[] = $category_guid;

        // Устанавливаем минимальную и максимальную цену
        $this->minValue = Product::where('status', 0)
            ->whereIn('category_id', $subCategoryGuids)
            ->min('price') ?? 0;

        $this->maxValue = Product::where('status', 0)
            ->whereIn('category_id', $subCategoryGuids)
            ->max('price') ?? 1000000;
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

        // Получаем GUID всех подкатегорий
        $subCategoryGuids = $category->children()->pluck('guid')->toArray();
        $subCategoryGuids[] = $category->guid;

        // Запрос на товары
        $query = Product::where('status', 0)
            ->whereIn('category_id', $subCategoryGuids)
            ->whereBetween('price', [$this->minValue, $this->maxValue]);

        // Применяем сортировку
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

        // Сортировка подкатегорий по алфавиту
        $subCategories = $category->children()->orderBy('title')->get();

        return view('livewire.sub-category-component', [
            'category' => $category,
            'products' => $products,
            'subCategories' => $subCategories,
            'minValue' => $this->minValue,
            'maxValue' => $this->maxValue,
        ])->layout('layouts.base');
    }
}
