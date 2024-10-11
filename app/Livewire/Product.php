<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $slug;
    private $selectedProductColor;

    public function render()
    {
        $product = \App\Models\Product::where('slug', $this->slug)->with('productColors.color')->firstOrFail();
        return view('livewire.product', compact('product'));
    }

    public function selectProductColor($color) {
        $this->selectedProductColor = $color;
    }

    public function addItem()
    {
        $product = \App\Models\Product::where('slug', $this->slug)->firstOrFail();
        $this->dispatch('add-to-cart', product: $product, productColor: $this->selectedProductColor || null);
    }
}
