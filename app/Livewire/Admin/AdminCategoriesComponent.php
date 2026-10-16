<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoriesComponent extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $search = "%" . $this->searchTerm . "%";
        $categories = Category::where('title', 'LIKE', $search)->orderBy('id', 'ASC')->paginate(8);

        return view('livewire.admin.admin-categories-component', [
            'categories' => $categories,
        ])->layout('layouts.admin');
    }
}
