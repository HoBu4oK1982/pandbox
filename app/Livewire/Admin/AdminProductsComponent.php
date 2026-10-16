<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductsComponent extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $products = Product::where('title', 'LIKE', $search)
        ->orderBy('id', 'ASC')
        ->paginate(10);

        return view('livewire.admin.admin-products-component', [
            'products' => $products,
        ])->layout('layouts.admin');
    }
}
