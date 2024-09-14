<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public function addItemToCart(string $slug)
    {
        $product = \App\Models\Product::where('slug', $slug)->first();
        $this->dispatch('add-to-cart', product: $product);
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->orWhere('customer_email', Auth::user()->email)
            ->paginate(10);

        return view('livewire.orders', compact('orders'));
    }
}
