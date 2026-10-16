<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class FooterComponent extends Component
{
    public function render()
    {
        $categories = Category::whereNull('parent_id')->get();

        return view('livewire.footer-component', [
            'categories' => $categories,
        ]);
    }
}
