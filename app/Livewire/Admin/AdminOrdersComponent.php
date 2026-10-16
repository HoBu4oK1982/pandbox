<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;



class AdminOrdersComponent extends Component
{
    use WithPagination;

    public function updateOrderStatus ($order_id, $status){
        
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered"){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        } else if($status  == "canceled"){
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }        
        $order->save();
        session()->flash('order_message', 'Статус успешно изменен!');

    }


    public function render() {

        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-orders-component', [
            'orders' => $orders,
        ])->layout('layouts.admin');

    }
}
