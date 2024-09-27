<div>
    <div class="mx-auto max-w-7xl my-32">
        <div class="flex flex-row gap-x-8">
            <div class="w-1/4">
                <div class="dice rounded-lg border border-gray-100"
                     style="background: url({{ asset('images/arcanis-repeat-logo-pw.jpg') }}); background-size: 200%;">
                    <div class="content">
                        <div class="die">
                            <figure class="face face-1"></figure>
                            <figure class="face face-2"></figure>
                            <figure class="face face-3"></figure>
                            <figure class="face face-4"></figure>
                            <figure class="face face-5"></figure>
                            <figure class="face face-6"></figure>
                            <figure class="face face-7"></figure>
                            <figure class="face face-8"></figure>
                            <figure class="face face-9"></figure>
                            <figure class="face face-10"></figure>
                            <figure class="face face-11"></figure>
                            <figure class="face face-12"></figure>
                            <figure class="face face-13"></figure>
                            <figure class="face face-14"></figure>
                            <figure class="face face-15"></figure>
                            <figure class="face face-16"></figure>
                            <figure class="face face-17"></figure>
                            <figure class="face face-18"></figure>
                            <figure class="face face-19"></figure>
                            <figure class="face face-20"></figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-3/4">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-medium text-gray-900">{{ __('Customize your Dice') }}</h1>
                    <h1 class="text-xl font-medium text-gray-900">$60</h1>
                </div>
                <div class=" divide-y divide-gray-200 gap-y-8">
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
