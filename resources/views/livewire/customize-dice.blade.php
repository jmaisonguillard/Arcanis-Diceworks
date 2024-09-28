<div>
    <div class="mx-auto max-w-7xl my-32">
        <div class="flex flex-row gap-x-8">
            <div class="w-1/4">
{{--                <div class="dice rounded-lg border border-gray-100"--}}
{{--                     style="background: url({{ asset('images/arcanis-repeat-logo-pw.jpg') }}); background-size: 200%;">--}}
{{--                    <div class="content">--}}
{{--                        <div class="die">--}}
{{--                            <figure class="face face-1"></figure>--}}
{{--                            <figure class="face face-2"></figure>--}}
{{--                            <figure class="face face-3"></figure>--}}
{{--                            <figure class="face face-4"></figure>--}}
{{--                            <figure class="face face-5"></figure>--}}
{{--                            <figure class="face face-6"></figure>--}}
{{--                            <figure class="face face-7"></figure>--}}
{{--                            <figure class="face face-8"></figure>--}}
{{--                            <figure class="face face-9"></figure>--}}
{{--                            <figure class="face face-10"></figure>--}}
{{--                            <figure class="face face-11"></figure>--}}
{{--                            <figure class="face face-12"></figure>--}}
{{--                            <figure class="face face-13"></figure>--}}
{{--                            <figure class="face face-14"></figure>--}}
{{--                            <figure class="face face-15"></figure>--}}
{{--                            <figure class="face face-16"></figure>--}}
{{--                            <figure class="face face-17"></figure>--}}
{{--                            <figure class="face face-18"></figure>--}}
{{--                            <figure class="face face-19"></figure>--}}
{{--                            <figure class="face face-20"></figure>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="w-3/4">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-medium text-gray-900">{{ __('Customize your Dice') }}</h1>
                    <h1 class="text-xl font-medium text-gray-900">$60</h1>
                </div>
                <div>
                    <form>
                        <div class="text-sm font-medium text-gray-900">{{ __('Style') }}</div>
                        <div class="mt-2 grid grid-cols-3 gap-3 sm:grid-cols-3">
                            @foreach($diceStyles as $style)
                                <label aria-label="{{ $style['name'] }}" aria-description="{{ $style['description'] }}"
                                       class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                                    <input type="radio" wire:model.live="selectedStyle" name="dice-style" value="{{ $style['slug'] }}" class="sr-only">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span class="block text-sm font-medium text-gray-900">{{ $style['name'] }}</span>
                                            <span class="mt-1 flex items-center text-sm text-gray-500">{{ $style['description'] }}</span>
                                        </span>
                                    </span>
                                    <svg class="h-5 w-5 text-indigo-600 fill-heliotrope {{ $selectedStyle !== $style['slug'] ? 'invisible' : 'visible' }}" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <!--
                                      Active: "border", Not Active: "border-2"
                                      Checked: "border-indigo-600", Not Checked: "border-transparent"
                                    -->
                                    <span class="pointer-events-none absolute -inset-px rounded-lg border-2 {{ $selectedStyle === $style['slug'] ? 'border border-heliotrope' : 'border-2 border-transparent' }}"
                                          aria-hidden="true"></span>
                                </label>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="divide-y divide-gray-200 gap-y-8">
                    <div>
                        <div class="text-sm font-medium text-gray-900">{{ __('Select Colors') }}</div>
                        @foreach($colors->dice->powder->mica as $color)

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
