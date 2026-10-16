<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ShopComponent extends Component
{
    public function render()
    {
        $categories = Category::whereNull('parent_id')
            ->orderBy('position', 'ASC') // сортировка корневых по позиции
            ->with(['children' => function ($query) {
                $query->orderBy('title') // сортировка детей по алфавиту
                    ->with(['children' => function ($subQuery) {
                        $subQuery->orderBy('title'); // сортировка внуков по алфавиту
                    }]);
            }])
            ->get();
        return view('livewire.shop-component', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
