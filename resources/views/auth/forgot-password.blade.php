<x-guest-layout>
    <div class="container max-w-[1440px] justify-center flex flex-col gap-2 items-center p-8 shadow-xl rounded-xl">
        <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[61px]">
                <img src="{{ asset('images/Key.png') }}" alt="">
            </div>
    
            <h1 class="text-[23px] font-semibold">
                Forgot Password ?
            </h1>

            <div class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('No worries, we’ll send you reset instructions.') }}
            </div>
        </div>

        <div class="w-full items-center">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div class="w-full">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="w-full flex justify-center mt-5">
                    <x-primary-button>
                        <a href="{{ route('check-email') }}">
                            {{ __('Reset Password') }}
                        </a>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>