<?php
namespace App\Livewire;
class SaleComponent extends RemarkProductsComponent
{
    protected function remark(): string { return 'sale'; }
    protected function viewName(): string { return 'livewire.sale-component'; }
    protected function productVariable(): string { return 'remark__sale'; }
}
