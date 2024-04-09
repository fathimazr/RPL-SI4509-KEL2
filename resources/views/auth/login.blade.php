<x-guest-layout>
    <div class="flex gap-4 p-5 justify-between shadow-2xl rounded-2xl">
        
        <div class="h-[500px] flex flex-col gap-3 text-center text-lg font-bold">
            <div class="w-[195.152px] h-[37px]">
                <img aria-hidden="true" class="w-full h-full"
                 src="{{ asset('images/login2.png') }}"
                 alt=""/>
            </div>

            <div class="h-full py-2 flex flex-col items-center">
                <img aria-hidden="true" class="w-full h-full "
                 src="{{ asset('images/login1.png') }}"
                 alt=""/>

                 <h1>www.gridgeoalert.com</h1>
            </div>
        </div>

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Hello, Welcome Back!
                </h1>

                <h2 class="mb-4 text-base font-semibold text-gray-700">
                    Login to your account
                </h2>

                <hr class="my-4"/>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="employee_id" :value="__('Employee ID')" />
                        <x-text-input id="employee_id" class="block w-full" type="text" name="employee_id" :value="old('employee_id')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                    
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <hr class="my-8"/>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-blue-700 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                        
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>