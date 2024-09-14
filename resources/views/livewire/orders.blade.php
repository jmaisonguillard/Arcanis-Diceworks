@php
    use Carbon\Carbon;
@endphp

<div class="min-h-screen">
    <div class="max-w-7xl mx-auto py-16">
        <h2 class="text-3xl font-bold text-cinder py-4">Order History</h2>
        <p class="text-gray-600 pb-16">Check the status of recent orders, manage returns, and discover similar
            products.</p>

        @foreach($orders as $order)
            <div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-lg sm:border mb-12">
                <h3 class="sr-only">Order placed on
                    <time datetime="{{ Carbon::make($order->created_at)->format('Y-m-d') }}">{{ Carbon::make($order->created_at)->format('F d, Y') }}</time>
                </h3>

                <div class="flex items-center border-b border-gray-200 p-4 sm:grid sm:grid-cols-4 sm:gap-x-6 sm:p-6">
                    <dl class="grid flex-1 grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-4 lg:col-span-2">
                        <div>
                            <dt class="font-medium text-gray-900">Order number</dt>
                            <dd class="mt-1 text-gray-500">{{ $order->id  }}</dd>
                        </div>
                        <div class="hidden sm:block">
                            <dt class="font-medium text-gray-900">Date placed</dt>
                            <dd class="mt-1 text-gray-500">
                                <time datetime="{{ Carbon::make($order->created_at)->format('Y-m-d') }}">{{ Carbon::make($order->created_at)->format('M d, Y') }}</time>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Total amount</dt>
                            <dd class="mt-1 font-medium text-gray-900">${{ number_format($order->total_price, 2) }}</dd>
                        </div>
                    </dl>

                    <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
                        @if($order->receipt_url)
                            <a href="{{ $order->receipt_url }}"
                               target="_blank"
                               class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-2.5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span>View Receipt</span>
                                <span class="sr-only">for order {{ $order->id }}</span>
                            </a>
                        @endif
                    </div>
                </div>

                @if($order->shipping_details)
                    <dl class="grid grid-cols-2 gap-x-6 py-10 px-4 text-sm">
                        <div>
                            <dt class="font-medium text-gray-900">Shipping address</dt>
                            <dd class="mt-2 text-gray-700">
                                <address class="not-italic">
                                    <span class="block">{{ $order->customer_name }}</span>
                                    <span class="block">{{ $order->shipping_address }}</span>
                                    <span class="block">{{ $order->city }}, {{ $order->shipping_details['state'] }} {{ $order->postal_code }}</span>
                                    <span class="block">{{ $order->country }}</span>
                                </address>
                            </dd>
                        </div>
                    </dl>
                @endif

                <!-- Products -->
                <h4 class="sr-only">Items</h4>
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($order->orderItems as $product)
                        <li class="p-4 sm:p-6">
                            <div class="flex items-center sm:items-start">
                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg bg-gray-200 sm:h-40 sm:w-40">
                                    <img
                                        src="{{ $product->product->primary_photo }}"
                                        alt="{{ $product->product->meta_keywords }}"
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <div class="ml-6 flex-1 text-sm">
                                    <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                                        <h5>{{ $product->product->name }}</h5>
                                        <p class="mt-2 sm:mt-0">${{ number_format($product->product->price, 2) }} x {{ number_format($product->quantity) }}</p>
                                    </div>
                                    <p class="hidden text-gray-500 sm:mt-2 sm:block">{{ $product->product->description }}</p>
                                </div>
                            </div>

                            <div class="mt-6 sm:flex sm:justify-between">
                                <div class="flex items-center">
{{--                                    <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                         aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"--}}
{{--                                              clip-rule="evenodd"></path>--}}
{{--                                    </svg>--}}
{{--                                    <p class="ml-2 text-sm font-medium text-gray-500">Delivered on--}}
{{--                                        <time datetime="2021-07-12">July 12, 2021</time>--}}
{{--                                    </p>--}}
                                    <p class="ml-2 text-sm font-medium text-gray-500">
                                        @switch($order->status)
                                            @case('completed')
                                                Order Ready, Awaiting Shipment
                                                @break

                                            @case('shipped')
                                                On Its Way Through the Arcane Roads
                                                @break

                                            @case('delivered')
                                                Safely Delivered to Your Realm
                                                @break
                                        @endswitch
                                    </p>
                                </div>

                                <div
                                    class="mt-6 flex items-center space-x-4 divide-x divide-gray-200 border-t border-gray-200 pt-4 text-sm font-medium sm:ml-4 sm:mt-0 sm:border-none sm:pt-0">
                                    <div class="flex flex-1 justify-center">
                                        <a href="{{ route('products.show', ['slug' => $product->product->slug]) }}" class="whitespace-nowrap text-indigo-600 hover:text-indigo-500">View
                                            product</a>
                                    </div>
                                    <div class="flex flex-1 justify-center pl-4">
                                        <a wire:click.prevent="addItemToCart('{{ $product->product->slug }}')" href="#" class="whitespace-nowrap text-indigo-600 hover:text-indigo-500">Buy
                                            again</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <div class="pb-16 mr-24">
            {{ $orders->links() }}
        </div>
    </div>
</div>
