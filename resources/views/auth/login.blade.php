<x-guest-layout class="min-h-[60vh] flex flex-col items-center justify-center">
    <!-- Login Card -->
    <div>
        <x-auth-session-status class="mb-4 text-gray-900 dark:text-gray-100" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="email"
                    class="block mt-1 w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="password"
                    class="block mt-1 w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')"
                    class="mt-2 text-sm text-red-600 dark:text-red-400" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 checked:bg-indigo-600 checked:dark:bg-indigo-500 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-400" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>

<!-- Register Link Outside Guest Layout -->
@if (Route::has('register'))
    <div class="mt-6 text-center text-gray-600 dark:text-gray-400">
        <span class="text-sm">Don’t have an account?</span>
        <a href="{{ route('register') }}"
            class="ml-1 text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
            {{ __('Register here') }}
        </a>
    </div>
@endif