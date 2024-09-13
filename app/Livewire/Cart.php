<?php

namespace App\Livewire;

use App\Nova\User;
use Illuminate\Support\Facades\Session;
use Laravel\Cashier\Checkout;
use Livewire\Component;

class Cart extends Component
{
    public $products = [];

    protected $listeners = ['add-to-cart' => 'handleAddToCart'];

    // Load the cart from session when the component is initialized
    public function mount()
    {
        $this->loadCartFromSession();
    }

    public function getCartCount()
    {
        $totalQuantity = 0;

        foreach ($this->products as $item) {
            $totalQuantity += $item['quantity'];
        }

        return $totalQuantity;
    }

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

        // Save cart to session after modifying
        $this->saveCartToSession();
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

        // Save cart to session after modifying
        $this->saveCartToSession();
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

        // Save cart to session after modifying
        $this->saveCartToSession();
    }

    // Load the cart from session
    public function loadCartFromSession()
    {
        if (Session::has('cart')) {
            $this->products = Session::get('cart');
        }
    }

    // Clear the cart
    public function clearCart()
    {
        $this->products = [];
        Session::forget('cart');
    }

    // Save the cart to session
    public function saveCartToSession()
    {
        Session::put('cart', $this->products);
    }

    // Method to get an array of stripe_price_id and quantity
    public function getStripePriceIdsAndQuantities()
    {
        // Use array_map to extract stripe_price_id and quantity
        return array_map(function ($item) {
            return [
                $item['product']['stripe_price_id'] => $item['quantity'],
            ];
        }, $this->products);
    }

    public function goToCheckout() {
        dd($this->getStripePriceIdsAndQuantities());
        return Checkout::guest()->create($this->getStripePriceIdsAndQuantities(), [
            'success_url' => route('order.success'),
            'cancel_url' => route('order.cancel'),
        ]);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
