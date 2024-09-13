<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $slug;

    public function render()
    {
        $product = \App\Models\Product::where('slug', $this->slug)->firstOrFail();
        return view('livewire.product', compact('product'));
    }

    public function addItem()
    {
        $product = \App\Models\Product::where('slug', $this->slug)->firstOrFail();
        $this->dispatch('add-to-cart', product: $product);
    }
}
