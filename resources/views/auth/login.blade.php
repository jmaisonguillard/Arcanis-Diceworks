<x-layouts.auth>
    <div class="max-w-7xl shadow-lg border border-cinder mx-auto w-full">
        <div class="grid grid-cols-2 min-h-[800px]">
            <div class="bg-cinder">
                <div class="flex flex-col h-full">
                    <div class="grow py-8 px-16 flex flex-col">
                        <div class="flex justify-center">
                            <x-application-mark class="block h-9 w-auto"/>
                        </div>
                        <h1 class="font-semibold text-5xl mt-24">{{ __('Sign In') }}</h1>
                        <p class="font-normal leading-6 py-8">{{ __('"Time to roll initiative! Sign in to rejoin the quest and wield your dice with power.') }}</p>
                        @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                        @endsession

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mt-8">
                                <x-input id="email" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-8">
                                <x-input id="password" class="block mt-1 w-full border-t-0 border-l-0 border-r-0 rounded-none bg-transparent border-b-mine text-white placeholder-white" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                            </div>

                            @if (Route::has('password.request'))
                                <a class="block pt-4 text-sm text-white rounded-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <div class="block mt-8">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox class="border-white bg-transparent rounded-none" id="remember_me" name="remember" />
                                    <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <x-adv-button :color="'white'" class="ms-4">
                                    {{ __('Sign In') }}
                                </x-adv-button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-heliotrope grow-0 py-8 text-center text-sm">
                        Don't have an account?
                        <a class="font-bold" href="{{ route('register') }}">Register Here</a>
                    </div>
                </div>
            </div>
            <div class="bg-dice bg-cover"></div>
        </div>
    </div>
</x-layouts.auth>
