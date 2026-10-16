<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Cart;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::query()->where('user_id', Auth::id());

        return view('livewire.user.user-dashboard-component', [
            'ordersCount' => (clone $orders)->count(),
            'activeOrdersCount' => (clone $orders)->where('status', 'ordered')->count(),
            'deliveredOrdersCount' => (clone $orders)->where('status', 'delivered')->count(),
            'wishlistCount' => Cart::instance('wishlist')->count(),
            'recentOrders' => (clone $orders)->latest()->limit(3)->get(),
        ])->layout('layouts.base');
    }
}
