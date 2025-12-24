<x-guest-layout title="Welcome back" description="Sign in to manage your tournaments, teams, and results.">

    <x-auth-session-status class="mb-6 text-sm text-muted-foreground" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Remember --}}
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-input text-primary focus:ring-primary">
                <span class="ms-2 text-sm text-muted-foreground">
                    {{ __('Remember me') }}
                </span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <x-primary-button class="w-full justify-center">
            {{ __('Log in') }}
        </x-primary-button>
    </form>

    {{-- Divider --}}
    @if (Route::has('register'))
        <div class="mt-8 text-center">
            <span class="text-sm text-muted-foreground">
                Don’t have an account?
            </span>
            <a href="{{ route('register') }}" class="ml-1 text-sm font-medium text-primary hover:underline">
                {{ __('Register here') }}
            </a>
        </div>
    @endif

</x-guest-layout>
