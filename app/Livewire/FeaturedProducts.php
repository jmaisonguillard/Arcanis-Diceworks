<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class FeaturedProducts extends Component
{
    public function render()
    {
        $category = Category::firstOrFail();
        return view('livewire.featured-products', compact('category'));
    }
}
