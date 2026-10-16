<?php

namespace App\Livewire;

use Livewire\Component;

class CartCountComponent extends Component
{
    public string $variant = 'header';

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(string $variant = 'header'): void
    {
        $this->variant = $variant;
    }

    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
