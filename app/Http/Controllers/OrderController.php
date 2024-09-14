<?php

namespace App\Http\Controllers;

use App\Models\Order;
use GPBMetadata\Google\Api\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Cashier\Cashier;
use Stripe\PaymentIntent;

class OrderController extends Controller
{
    public function cancel() {
        return view('order.cancel');
    }

    public function success(Request $request) {
        $sessionId = $request->get('session_id');

        if ($sessionId === null) {
            return view('errors.404');
        }

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

        if ($session->payment_status !== 'paid') {
            return view('errors.404');
        }

        $orderId = $session['metadata']['order_id'] ?? null;

        $order = Order::findOrFail($orderId);

        $intent = Cashier::stripe()->paymentIntents->retrieve($session->payment_intent);
        $method = Cashier::stripe()->paymentMethods->retrieve($intent->payment_method);
        $charge = Cashier::stripe()->charges->retrieve($intent->latest_charge);

        $order->update([
            'status' => 'completed',
            'receipt_url' => $charge->receipt_url,
        ]);

        Session::forget('cart');

        return view('order.success', compact('order', 'session', 'method'));
    }

    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->orWhere('email', $request->user()->email)
            ->paginate(10);

        return view('order.index', compact('orders'));
    }
}
