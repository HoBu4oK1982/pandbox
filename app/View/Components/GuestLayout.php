<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // Auth pages must share the same shell as the storefront. Keeping a
        // second document layout caused Livewire navigation to retain stale
        // scripts, the old WhatsApp widget and an incomplete footer.
        return view('layouts.base');
    }
}
