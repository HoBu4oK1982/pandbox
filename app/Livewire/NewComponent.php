<?php
namespace App\Livewire;
class NewComponent extends RemarkProductsComponent
{
    protected function remark(): string { return 'new'; }
    protected function viewName(): string { return 'livewire.new-component'; }
    protected function productVariable(): string { return 'remark__new'; }
}
