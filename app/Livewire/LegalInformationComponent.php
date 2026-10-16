<?php

namespace App\Livewire;

use Livewire\Component;

class LegalInformationComponent extends Component
{
    public function render()
    {
        return view('livewire.legal-information-component')->layout('layouts.base');
    }
}
