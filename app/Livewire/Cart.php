<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\ProductColor;
use App\Nova\User;
use GPBMetadata\Google\Api\Auth;
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

    public function handleAddToCart(\App\Models\Product $product, ProductColor | null $color)
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
                'productColor' => $color
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
        $items = [];

        foreach ($this->products as $product) {
            $items = [...$items, $product['product']['stripe_price_id'] => $product['quantity']];
        }

        return $items;
    }

    public function getCartPrice()
    {
        $totalPrice = 0;

        foreach ($this->products as $product) {
            $totalPrice += $product['quantity'] * $product['product']['price'];
        }

        return $totalPrice;
    }

    public function goToCheckout() {
        $order = Order::create([
            'total_price' => $this->getCartPrice(),
        ]);

        foreach ($this->products as $product) {
            $order->orderItems()->create([
                'order_id' => $order->id,
                'product_id' => $product['product']['id'],
                'product_name' => $product['product']['name'],
                'price' => $product['product']['price'],
                'quantity' => $product['quantity'],
            ]);
        }

        $order->save();


        return Checkout::guest()->create($this->getStripePriceIdsAndQuantities(), [
            'success_url' => route('order.success', ['order' => $order->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('order.cancel'),
            'metadata' => [
                'order_id' => $order->id,
                'user_id' => \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : null,
            ],
            'billing_address_collection' => 'required',
            'shipping_address_collection' => [
                'allowed_countries' => ['US', 'CA']
            ],
            'shipping_options' => [
                ['shipping_rate' => env('STRIPE_SHIPPING_RATE')]
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
