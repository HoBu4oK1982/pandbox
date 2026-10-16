<?php
namespace App\Livewire;
class HitComponent extends RemarkProductsComponent
{
    protected function remark(): string { return 'hit'; }
    protected function viewName(): string { return 'livewire.hit-component'; }
    protected function productVariable(): string { return 'remark__hit'; }
}
