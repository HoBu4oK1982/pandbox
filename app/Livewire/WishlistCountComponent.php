<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    public string $variant = 'header';

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(string $variant = 'header'): void
    {
        $this->variant = $variant;
    }

    public function render()
    {
        return view('livewire.wishlist-count-component');
    }
}
