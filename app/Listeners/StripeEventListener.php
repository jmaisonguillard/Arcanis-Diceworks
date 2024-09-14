<?php

namespace App\Listeners;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if($event->payload['type'] == 'checkout.session.completed') {
            $data = $event->payload['data']['object'];
            $customer = $data['customer_details'];
            $customer_address = $data['customer_details']['address'];
            $shipping_address = $data['shipping_details']['address'];
            $order_id = $data['metadata']['order_id'];
            $user_id = $data['metadata']['user_id'];
            $order = Order::findorFail($order_id);

            // Update order based off information
            $order->update([
                'user_id' => $user_id,
                'customer_name' =>$customer['name'],
                'customer_email' => $customer['email'],
                'shipping_address' => $shipping_address['line1'] . $shipping_address['line2'],
                'city' => $shipping_address['city'],
                'country' => $shipping_address['country'],
                'postal_code' => $shipping_address['postal_code'],
                'status' => 'processing',
                'payment_status' => 'paid',
                'payment_method' => 'card',
                'stripe_payment_id' => $data['payment_intent'],
                'total_price' => $data['amount_total'] / 100,
                'shipping_price' => 0,
                'billing_details' => $customer_address,
                'shipping_details' => $shipping_address,
            ]);
        }
    }
}
