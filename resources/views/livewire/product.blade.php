@php
    use Carbon\Carbon;
@endphp

@section('title')
    {{ config('app.name', 'Arcanis Diceworks') }} - {{ $product->name }}
@endsection

@section('meta-data')
    <meta name="description" content="{{ $product->meta_description }}">
    <meta name="title" content="{{ $product->meta_title }}">
    <meta name="keywords" content="{{ $product->meta_keywords }}">
@endsection

@section('og-data')
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:description" content="{{ $product->description }}" />
    <meta property="og:image" content="{{ $product->getMedia('*')[0]->getUrl() }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ url()->current() }}" />
@endsection

@section('twitter-card-data')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $product->name }}">
    <meta name="twitter:description" content="{{ $product->description }}">
    <meta name="twitter:image" content="{{ $product->getMedia('*')[0]->getUrl() }}">
@endsection

<div class="max-w-7xl mx-auto my-16">
    <div class="flex flex-row gap-x-8 mb-12">
        <div>
            <img class="w-full h-auto min-w-[624px]" src="{{ $product->getMedia('*')[0]->getUrl() }}" alt="Product Image">
        </div>
        <div>
            <h1 class="font-semibold text-4xl mb-4">{{ $product->name }}</h1>
            <h3 class="font-semibold text-3xl bf-4">${{ number_format($product->price, 2) }}</h3>
            <section class="min-w-[450px] max-w-[450px] mb-12 mt-12">
                <span class="text-sm font-bold text-gray-90">{{ __('Color') }}</span>
                <div class="flex flex-row flex-wrap gap-3">
                    @foreach($product->productColors as $productColor)
                        <div wire:click="selectProductColor($productColor)" class="w-8 h-8 cursor-pointer border-gray-300 border rounded-full" style="background-color: {{$productColor->color->hex_code}};" title="{{ $productColor->color->name }}"></div>
                    @endforeach
                </div>
            </section>
            <div class="flex flex-row justify-end mb-12">
                <button wire:click="addItem" class="bg-black rounded-full text-white py-4 px-8 w-auto flex flex-row justify-center items-center align-middle gap-x-4 text-[1rem] mt-4">
                    Add to Cart
                    <div class="bg-white text-black w-[34px] h-[34px] flex justify-center align-middle items-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[8px] h-[8px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </div>
                </button>
            </div>
            <section aria-labelledby="details-heading" class="min-w-[450px] max-w-[450px]">
                <h2 id="details-heading" class="sr-only">Additional details</h2>

                <div class="divide-y divide-gray-200 border-t">
                    <div x-data="{ open: true }">
                        <h3>
                            <button type="button" x-description="Expand/collapse question button"
                                    class="group relative flex w-full items-center justify-between py-6 text-left"
                                    aria-controls="disclosure-1" @click="open = !open" aria-expanded="false"
                                    x-bind:aria-expanded="open.toString()">
                                    <span class="text-sm font-bold text-gray-900" x-state:on="Open"
                                          x-state:off="Closed"
                                          :class="{ 'font-bold': open, 'text-gray-900': !(open) }">{{ __('Description') }}</span>
                                <span class="ml-6 flex items-center">
                        <svg class="h-6 w-6 text-gray-400 group-hover:text-gray-500 block" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'hidden': open, 'block': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        <svg class="h-6 w-6" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'block': open, 'hidden': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"></path>
                        </svg>
                      </span>
                            </button>
                        </h3>
                        <div class="prose prose-sm pb-6" id="disclosure-1" x-show="open" style="display: none;">
                            {{ $product->description }}
                        </div>
                    </div>
                    <div x-data="{ open: true }">
                        <h3>
                            <button type="button" x-description="Expand/collapse question button"
                                    class="group relative flex w-full items-center justify-between py-6 text-left"
                                    aria-controls="disclosure-1" @click="open = !open" aria-expanded="false"
                                    x-bind:aria-expanded="open.toString()">
                                    <span class="text-sm font-bold text-gray-900" x-state:on="Open"
                                          x-state:off="Closed"
                                          :class="{ 'font-bold': open, 'text-gray-900': !(open) }">About These Dice</span>
                                <span class="ml-6 flex items-center">
                        <svg class="h-6 w-6 text-gray-400 group-hover:text-gray-500 block" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'hidden': open, 'block': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        <svg class="h-6 w-6 hidden" x-state:on="Open"
                             x-state:off="Closed" :class="{ 'block': open, 'hidden': !(open) }" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"></path>
                        </svg>
                      </span>
                            </button>
                        </h3>
                        <div class="prose prose-sm pb-6" id="disclosure-1" x-show="open" style="display: none;">
                            <div class="flex flex-row gap-x-5">
                                <div class="flex flex-col justify-start items-center">
                                    <div><i class="fa-thin fa-dice-d20 text-7xl"></i></div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">D20</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">22mm</div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start items-center">
                                    <div><i class="fa-thin fa-dice-d12 text-7xl"></i></div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">D12</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">19mm</div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start items-center">
                                    <div><i class="fa-thin fa-dice-d10 text-7xl"></i></div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">D10</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">16mm</div>
                                    </div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">D10%</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">16mm</div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start items-center">
                                    <div><i class="fa-thin fa-dice-d8 text-7xl"></i></div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">D8</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">16mm</div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start items-center">
                                    <div class="fill-gray-900">
                                        <svg class="h-[4.5rem]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112 215.44">
                                            <g fill="none" stroke-width="12" stroke="currentColor">
                                                <polygon class="cls-1" points="56 8.49 6 58.49 6 179.2 56 208.49 106 179.2 106 58.49 56 8.49"/>
                                                <line class="cls-1" x1="56" y1="8.49" x2="56" y2="208.49"/>
                                                <polyline class="cls-1" points="106 178.05 56.12 189.72 6 178.05"/>
                                                <polyline class="cls-1" points="6 58.49 55.88 67.08 106 58.49"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">D4</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">10mm</div>
                                    </div>
                                    <div class="flex flex-row gap-x-1">
                                        <div class="text-gray-700 text-xs font-bold mt-1">Style</div>
                                        <div class="text-gray-700 text-xs font-normal mt-1">Crystal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <hr>
    <section class="mt-12">
        <h3 class="font-bold text-4xl text-center">{{ __('You Might Also Like') }}</h3>
       <div class="flex flex-row gap-x-12 mt-12">
           @foreach($product->recommended(4) as $rProduct)
               <div class="flex flex-col">
                   <div class="relative">
                       @if($rProduct->created_at >= Carbon::now()->subMonth())
                           <div class="absolute flex flex-row top-4 left-4 right-4">
                               <div class="bg-dodger-blue bg-opacity-10 text-dodger-blue text-xs font-bold py-2 px-6 rounded">New In</div>
                           </div>
                       @endif

                       @if(!$rProduct->stock_quantity)
                           <div class="absolute flex flex-row top-4 left-4 right-4">
                               <div class="bg-minsk bg-opacity-10 text-minsk text-xs font-bold py-2 px-6 rounded">Sold Out</div>
                           </div>
                       @endif

                       <a href="{{ route('products.show', [$rProduct->slug]) }}" class="absolute top-4 right-4">
                           <div class="bg-heliotrope bg-opacity-10 text-heliotrope text-xs font-bold p-2 rounded">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[13px] h-[13px]">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                               </svg>
                           </div>
                       </a>
                       <div class="absolute bottom-0 right-0 bg-bunker text-white font-semibold text-2xl w-[76px] h-[76px] flex justify-center items-center align-middle">
                           @php
                               // Assuming $product->price is a float, e.g., 20.00
                               $priceParts = explode('.', number_format($rProduct->price, 2)); // Split the price into whole and decimal parts
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
                       <a href="{{ route('products.show', [$rProduct->slug]) }}">
                        <img class="w-72 h-72 object-cover" src="{{ $rProduct->getMedia('*')[0]->getUrl() }}" alt="">
                       </a>
                   </div>
                   <div class="font-semibold text-[13px] py-3">
                       <a href="{{ route('products.show', [$rProduct->slug]) }}">
                           {{ $rProduct->name }}
                       </a>
                   </div>
               </div>
           @endforeach
       </div>
    </section>
</div>
