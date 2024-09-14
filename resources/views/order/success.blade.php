<x-layouts.app>
    <div class="max-w-7xl mx-auto my-32 flex flex-col justify-center items-center">
        <img class="w-72 h-auto dice-spin" src="{{ url('/images/svgs/success.svg') }}" alt="">
        <h3 class="font-bold text-3xl my-8">Critical Success!</h3>
        <p class="max-w-xl mx-auto">You rolled a natural 20 on your order! Your dice are on the way to your party, ready
            to bring luck, fortune, and a little bit of magic to your game.</p>
        <div class="border-t border-t-athens w-full my-16">
            @foreach($order->orderItems as $item)
                <div class="flex space-x-6 border-b border-athens py-10">
                    <img class="h-40 w-40 flex-none rounded-lg object-cover object-center" src="{{ $item->product->getMedia('*')[0]->getUrl() }}" alt="">
                    <div class="flex flex-auto flex-col">
                        <div class="font-medium text-cinder">{{ $item->product->name }}</div>
                        <div class="mt-2 text-sm text-cinder">{{ $item->product->description }}</div>
                        <div class="mt-6 flex flex-1 items-end">
                            <dl class="flex space-x-4 divide-x divide-athens text-sm sm:space-x-6">
                                <div class="flex">
                                    <dt class="font-medium text-cinder">Quantity</dt>
                                    <dd class="ml-2 text-bastille">{{ $item->quantity }}</dd>
                                </div>
                                <div class="flex pl-4 sm:pl-6">
                                    <dt class="font-medium text-cinder">Price</dt>
                                    <dd class="ml-2 text-bastille">${{ number_format($item->price * $item->quantity, 2) }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="sm:ml-40 sm:pl-6">
                    <h3 class="sr-only">Your information</h3>

                    <h4 class="sr-only">Addresses</h4>
                    <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
                        <div>
                            <dt class="font-medium text-gray-900">Shipping address</dt>
                            <dd class="mt-2 text-gray-700">
                                <address class="not-italic">
                                    <span class="block">{{ $session->shipping_details['name'] }}</span>
                                    <span class="block">{{ $session->shipping_details['address']['line1'] . $session->shipping_details['address']['line2'] }}</span>
                                    <span class="block">{{ $session->shipping_details['address']['city'] }}, {{ $session->shipping_details['address']['state'] }} {{ $session->customer_details['address']['postal_code'] }}</span>
                                    <span class="block">{{ $session->shipping_details['address']['country'] }}</span>
                                </address>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Billing address</dt>
                            <dd class="mt-2 text-gray-700">
                                <address class="not-italic">
                                    <span class="block">{{ $session->customer_details['name'] }}</span>
                                    <span class="block">{{ $session->customer_details['address']['line1'] . $session->customer_details['address']['line2'] }}</span>
                                    <span class="block">{{ $session->customer_details['address']['city'] }}, {{ $session->customer_details['address']['state'] }} {{ $session->customer_details['address']['postal_code'] }}</span>
                                    <span class="block">{{ $session->customer_details['address']['country'] }}</span>
                                </address>
                            </dd>
                        </div>
                    </dl>

                    <h4 class="sr-only">Payment</h4>
                    <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
                        <div>
                            <dt class="font-medium text-gray-900">Payment method</dt>
                            <dd class="mt-2 text-gray-700">
                                <p class="capitalize">{{ $method->type }}</p>
                                <p class="capitalize">{{ $method->card->brand }}</p>
                                <p><span aria-hidden="true">••••</span><span class="sr-only">Ending in </span>{{ $method->card->last4 }}</p>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Shipping method</dt>
                            <dd class="mt-2 text-gray-700">
                                <p>Standard</p>
                            </dd>
                        </div>
                    </dl>

                    <h3 class="sr-only">Summary</h3>

                    <dl class="space-y-6 border-t border-gray-200 pt-10 text-sm">
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">Subtotal</dt>
                            <dd class="text-gray-700">${{ number_format($session->amount_subtotal / 100, 2) }}</dd>
                        </div>
{{--                        <div class="flex justify-between">--}}
{{--                            <dt class="flex font-medium text-gray-900">--}}
{{--                                Discount--}}
{{--                                <span class="ml-2 rounded-full bg-gray-200 px-2 py-0.5 text-xs text-gray-600">STUDENT50</span>--}}
{{--                            </dt>--}}
{{--                            <dd class="text-gray-700">-$18.00 (50%)</dd>--}}
{{--                        </div>--}}
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">Shipping</dt>
                            <dd class="text-gray-700">${{ number_format($session->shipping_cost / 100, 2) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">Total</dt>
                            <dd class="text-gray-900">${{ number_format($session->amount_total / 100, 2) }}</dd>
                        </div>
                    </dl>
                </div>
        </div>
    </div>
</x-layouts.app>
