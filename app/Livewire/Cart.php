<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $products = [];

    protected $listeners = ['add-to-cart' => 'handleAddToCart'];

    public function handleAddToCart(\App\Models\Product $product)
    {
        $existingItem = collect($this->products)->firstWhere('product.id', $product->id);

        if ($existingItem) {
            // If the product is already in the cart, increment the quantity
            $this->incrementQuantity($product->id);
        } else {
            // If the product is not in the cart, add it with a quantity of 1
            $this->products[] = [
                'product' => $product,
                'preview' => $product->getMedia('*')[0]->getUrl(),
                'quantity' => 1,
            ];
        }
    }

    // Increment the quantity of an existing product in the cart
    public function incrementQuantity($productId)
    {
        foreach ($this->products as &$item) {
            if ($item['product']->id === $productId) {
                $item['quantity'] += 1;
                break;
            }
        }
    }

    // Decrement the quantity of an existing product in the cart
    public function decrementQuantity($productId)
    {
        foreach ($this->products as &$item) {
            if ($item['product']->id === $productId && $item['quantity'] > 1) {
                $item['quantity'] -= 1;
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
