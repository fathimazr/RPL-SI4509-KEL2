<x-guest-layout>
    <div class="container max-w-[1440px] justify-center flex flex-col gap-2 items-center p-8 shadow-xl rounded-xl">
        <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[61px]">
                <img src="{{ asset('images/mail.png') }}" alt="">
            </div>
    
            <h1 class="text-[23px] font-semibold">
                Check your Email
            </h1>

            <div class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('We sent a password reset link to your email.') }}
            </div>

            <div class="w-full flex justify-center mt-3">
                <x-primary-button>
                    <a href="{{ route('reset-password') }}">
                        {{ __('Reset Password') }}
                    </a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-guest-layout>