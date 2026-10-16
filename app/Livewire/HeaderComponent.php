<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderComponent extends Component
{
    public function render()
    {
        $categories = Category::whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->orderBy('title')
                    ->with(['children']);
            }])
            ->get();

        return view('livewire.header-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
