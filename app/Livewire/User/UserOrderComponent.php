<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserOrderComponent extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function cancelOrder(){
        $order = Order::query()
            ->where('user_id', Auth::id())
            ->whereKey($this->order_id)
            ->firstOrFail();

        if ($order->status !== 'ordered') {
            return;
        }

        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message', 'Заказ был успешно отменен!');
    }


    public function render()
    {
        $order = Order::query()
            ->with('orderItems.product')
            ->where('user_id', Auth::id())
            ->whereKey($this->order_id)
            ->firstOrFail();
        return view('livewire.user.user-order-component', ['order'=>$order])->layout('layouts.base');
    }
}
