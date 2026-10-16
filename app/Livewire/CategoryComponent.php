<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class CategoryComponent extends Component
{
    use WithPagination;
    public $category_slug;
    public $sorting = 'default';
    public $pagesize = 32;

    public function mount($slug)
    {
        $this->category_slug = $slug;
    }


    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();

    $category->load([
        'children' => function ($query) {
            $query->orderBy('title') // сортировка подкатегорий
                  ->with(['children' => function ($subQuery) {
                      $subQuery->orderBy('title'); // сортировка под-подкатегорий
                  }]);
        },
        'children.products'
    ]);

    $productIds = [];

    if ($category && $category->children) {
        foreach ($category->children as $child) {
            foreach ($child->products as $product) {
                $productIds[] = $product->id;
            }

            // Если нужно собирать продукты и от под-подкатегорий:
            foreach ($child->children as $grandChild) {
                foreach ($grandChild->products as $product) {
                    $productIds[] = $product->id;
                }
            }
        }
    }

    $query = Product::whereIn('id', $productIds)
                ->where('status', 0);

    // Сортировка
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
            // Без сортировки (или по умолчанию, если нужно)
            break;
    }

    // Пагинация
    $products = $query->paginate($this->pagesize);

    return view('livewire.category-component', [
        'category' => $category,
        'products' => $products,
    ])->layout('layouts.base');
    }

    private function collectProducts($category, &$products)
    {
        foreach ($category->products as $product) {
            $products->push($product);
        }    
        
        foreach ($category->children as $child) {
            $this->collectProducts($child, $products);
        }
    }
}
