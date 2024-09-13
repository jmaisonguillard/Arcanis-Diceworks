<?php

namespace App\Livewire;

use Livewire\Component;

class NewProducts extends Component
{
    public function render()
    {
        $newestProducts = \App\Models\Product::newest()->get();
        return view('livewire.new-products', compact('newestProducts'));
    }
}
