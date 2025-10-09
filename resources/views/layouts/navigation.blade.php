<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <!-- Light Logo -->
                <img src="{{ asset('images/logo-light.png') }}" alt="Logo" class="h-8 w-auto block dark:hidden">
                <!-- Dark Logo -->
                <img src="{{ asset('images/logo-dark.png') }}" alt="Logo" class="h-8 w-auto hidden dark:block">
            </a>

            <!-- Desktop Links -->
            <div class="hidden sm:flex space-x-4">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                    class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>

            <!-- Auth Links -->
            <div class="hidden sm:flex items-center space-x-2">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    stroke="currentColor" viewBox="0 0 20 20">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8l5 5 5-5" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="px-3 py-1 rounded bg-indigo-600 text-white hover:bg-indigo-500 transition">
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-3 py-1 rounded bg-indigo-600 text-white hover:bg-indigo-500 transition">
                        {{ __('Register') }}
                    </a>
                @endauth
            </div>

            <!-- Mobile Hamburger -->
            <button @click="open = !open"
                class="sm:hidden p-2 rounded text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open}" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="sm:hidden fixed inset-0 bg-black bg-opacity-30 z-40" @click="open = false">
    </div>
    <div x-show="open" x-transition
        class="sm:hidden fixed top-0 right-0 w-64 h-full bg-white dark:bg-gray-900 shadow-lg z-50 transform">
        <div class="p-4 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
            <span class="font-semibold text-gray-800 dark:text-white">Menu</span>
            <button @click="open = false"
                class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Links -->
        <div class="flex flex-col p-4 space-y-2">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 
               rounded-md px-2 py-1 
               {{ request()->routeIs('home') ? 'bg-indigo-100 dark:bg-indigo-700 font-semibold' : '' }}">
                {{ __('Home') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 
               rounded-md px-2 py-1 
               {{ request()->routeIs('dashboard') ? 'bg-indigo-100 dark:bg-indigo-700 font-semibold' : '' }}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 
                           rounded-md px-2 py-1 
                           {{ request()->routeIs('profile.edit') ? 'bg-indigo-100 dark:bg-indigo-700 font-semibold' : '' }}">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 
                               rounded-md px-2 py-1" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block px-4 py-2 rounded text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="block px-4 py-2 rounded text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                    Register
                </a>
            @endauth

        </div>

    </div>
</nav>
