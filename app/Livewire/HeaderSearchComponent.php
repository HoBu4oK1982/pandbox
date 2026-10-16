<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search = '';
    public $query = '';
    public $products = [];
    public $categories = [];
    public bool $mobileMode = false;

    public function mount(bool $mobileMode = false)
    {
        $this->mobileMode = $mobileMode;
        $this->preset();
        $this->fill(request()->only('search'));
    }

    public function preset()
    {
        $this->query = '';
        $this->products = [];
        $this->categories = [];
    }

    public function updatedQuery()
    {
        $q = trim((string) $this->query);

        if (mb_strlen($q) < 2) {
            $this->products = [];
            $this->categories = [];
            return;
        }

        $variants = $this->keyboardVariants($q);

        $this->categories = Category::query()
            ->where('status', 0)
            ->where(function ($builder) use ($variants) {
                foreach ($variants as $variant) {
                    $like = '%' . $variant . '%';
                    $builder->orWhere('title', 'LIKE', $like)
                        ->orWhere('meta_keywords', 'LIKE', $like);
                }
            })
            ->select(['title', 'slug', 'image'])
            ->take(4)
            ->get()
            ->toArray();

        $this->products = Product::query()
            ->where('status', 0)
            ->where(function ($builder) use ($variants) {
                foreach ($variants as $variant) {
                    $like = '%' . $variant . '%';
                    $builder->orWhere('title', 'LIKE', $like)
                        ->orWhere('SKU', 'LIKE', $like)
                        ->orWhere('meta_keywords', 'LIKE', $like);
                }
            })
            ->select(['id', 'title', 'slug', 'SKU', 'images', 'price', 'sale_price'])
            ->take(7)
            ->get()
            ->toArray();
    }

    private function keyboardVariants(string $query): array
    {
        $english = "qwertyuiop[]asdfghjkl;'zxcvbnm,.`";
        $russian = 'йцукенгшщзхъфывапролджэячсмитьбюё';
        $enToRu = array_combine(mb_str_split($english), mb_str_split($russian));
        $ruToEn = array_flip($enToRu);

        $lower = mb_strtolower($query);
        $variants = [
            $query,
            strtr($lower, $enToRu),
            strtr($lower, $ruToEn),
        ];

        return array_values(array_unique(array_filter($variants)));
    }

    public function render()
    {
        return view('livewire.header-search-component');
    }
}
