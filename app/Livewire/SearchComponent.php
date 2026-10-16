<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $sorting = 'default';
    public $pagesize = 24;
    public $search = '';
    public $category = '';
    public $priceFrom = null;
    public $priceTo = null;
    public $onlySale = false;
    public $onlyNew = false;
    public $onlyHit = false;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function updated($property)
    {
        if (in_array($property, ['sorting', 'pagesize', 'category', 'priceFrom', 'priceTo', 'onlySale', 'onlyNew', 'onlyHit'], true)) {
            $this->resetPage();
        }
    }

    public function chooseCategory($guid = '')
    {
        $this->category = (string) $guid;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['category', 'priceFrom', 'priceTo', 'onlySale', 'onlyNew', 'onlyHit']);
        $this->sorting = 'default';
        $this->resetPage();
    }

    public function applyFilters(): void
    {
        $this->resetPage();
    }

    private function searchQuery(): Builder
    {
        $variants = $this->keyboardVariants(trim((string) $this->search));

        return Product::query()
            ->where('status', 0)
            ->when(!empty($variants), function (Builder $query) use ($variants) {
                $query->where(function (Builder $match) use ($variants) {
                    foreach ($variants as $variant) {
                        $like = '%' . $variant . '%';
                        $match->orWhere('title', 'LIKE', $like)
                            ->orWhere('SKU', 'LIKE', $like)
                            ->orWhere('meta_keywords', 'LIKE', $like);
                    }
                });
            }, function (Builder $query) {
                $query->whereRaw('1 = 0');
            });
    }

    private function keyboardVariants(string $query): array
    {
        if ($query === '') return [];

        $english = "qwertyuiop[]asdfghjkl;'zxcvbnm,.`";
        $russian = 'йцукенгшщзхъфывапролджэячсмитьбюё';
        $enToRu = array_combine(mb_str_split($english), mb_str_split($russian));
        $ruToEn = array_flip($enToRu);
        $lower = mb_strtolower($query);

        return array_values(array_unique(array_filter([
            $query,
            strtr($lower, $enToRu),
            strtr($lower, $ruToEn),
        ])));
    }

    public function render()
    {
        $base = $this->searchQuery();
        $categoryIds = (clone $base)->whereNotNull('category_id')->distinct()->pluck('category_id');
        $categories = Category::query()
            ->whereIn('guid', $categoryIds)
            ->orderBy('title')
            ->get(['guid', 'title', 'slug', 'image']);

        $bounds = (clone $base)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        $products = $base
            ->when($this->category !== '', fn (Builder $q) => $q->where('category_id', $this->category))
            ->when($this->priceFrom !== null && $this->priceFrom !== '', fn (Builder $q) => $q->where('price', '>=', (float) $this->priceFrom))
            ->when($this->priceTo !== null && $this->priceTo !== '', fn (Builder $q) => $q->where('price', '<=', (float) $this->priceTo))
            ->when($this->onlySale, fn (Builder $q) => $q->where(function (Builder $sale) {
                $sale->where('remark', 'sale')->orWhereNotNull('sale_price');
            }))
            ->when($this->onlyNew, fn (Builder $q) => $q->actualNew())
            ->when($this->onlyHit, fn (Builder $q) => $q->where('remark', 'hit'));

        match ($this->sorting) {
            'date' => $products->latest(),
            'price' => $products->orderByRaw('COALESCE(sale_price, price) ASC'),
            'price-desc' => $products->orderByRaw('COALESCE(sale_price, price) DESC'),
            'title' => $products->orderBy('title'),
            default => $products->orderByRaw("CASE WHEN title LIKE ? THEN 0 ELSE 1 END", [trim((string) $this->search) . '%'])->latest('id'),
        };

        return view('livewire.search-component', [
            'products' => $products->paginate((int) $this->pagesize),
            'categories' => $categories,
            'minPrice' => (float) ($bounds->min_price ?? 0),
            'maxPrice' => (float) ($bounds->max_price ?? 0),
        ])->layout('layouts.base');
    }
}
