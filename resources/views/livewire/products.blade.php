@php
    use Carbon\Carbon;
@endphp

<div class="max-w-7xl mx-auto">
    <div class="py-16">
        <div class="flex flex-row flex-wrap gap-4">
            @foreach($products as $product)
                <div class="flex flex-col">
                    <div class="relative">
                        @if($product->created_at >= Carbon::now()->subMonth())
                            <div class="absolute flex flex-row top-4 left-4 right-4">
                                <div class="bg-dodger-blue bg-opacity-10 text-dodger-blue text-xs font-bold py-2 px-6 rounded">New In</div>
                            </div>
                        @endif

                        @if(!$product->stock_quantity)
                            <div class="absolute flex flex-row top-4 left-4 right-4">
                                <div class="bg-minsk bg-opacity-10 text-minsk text-xs font-bold py-2 px-6 rounded">Sold Out</div>
                            </div>
                        @endif
                        <a href="{{ route('products.show', [$product->slug]) }}" class="absolute top-4 right-4">
                            <div class="bg-heliotrope bg-opacity-10 text-heliotrope text-xs font-bold p-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[13px] h-[13px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </div>
                        </a>
                        <div class="absolute bottom-0 right-0 bg-bunker text-white font-semibold text-2xl w-[76px] h-[76px] flex justify-center items-center align-middle">
                            @php
                                // Assuming $product->price is a float, e.g., 20.00
                                $priceParts = explode('.', number_format($product->price, 2)); // Split the price into whole and decimal parts
                                $whole = $priceParts[0]; // The whole number part
                                $decimal = $priceParts[1]; // The cents part
                            @endphp
                            <span>
                                ${{ $whole }}  <!-- Display whole number -->
                                @if($decimal > 0)
                                    <span class="absolute top-[6px] right-[6px] text-sm">{{ $decimal }}</span>  <!-- Display decimal part smaller -->
                                @endif
                            </span>
                        </div>
                        <a href="{{ route('products.show', [$product->slug]) }}">
                            <img class="w-72 h-72 object-cover" src="{{ $product->getMedia('*')[0]->getUrl() }}" alt="">
                        </a>
                    </div>
                    <div class="font-semibold text-[13px] py-3">
                        <a href="{{ route('products.show', [$product->slug]) }}">
                            {{ $product->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   <div class="pb-16 mr-24">
       {{ $products->links() }}
   </div>
</div>
