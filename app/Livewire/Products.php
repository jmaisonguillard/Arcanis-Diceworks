<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom-pagination'; // Use the custom pagination theme

    public function render()
    {
        $products = \App\Models\Product::paginate(20);

        return view('livewire.products', compact('products'));
    }
}
