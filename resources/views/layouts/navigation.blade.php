<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50 bg-background border-b border-border"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img
                    src="{{ asset('images/logo-light.png') }}"
                    alt="BracketForge"
                    class="h-8 w-auto dark:hidden"
                >
                <img
                    src="{{ asset('images/logo-dark.png') }}"
                    alt="BracketForge"
                    class="h-8 w-auto hidden dark:block"
                >
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden sm:flex items-center gap-2">
                <x-nav-link
                    :href="route('home')"
                    :active="request()->routeIs('home')"
                >
                    Home
                </x-nav-link>

                <x-nav-link
                    :href="route('tournaments.index')"
                    :active="request()->routeIs('tournaments.*')"
                >
                    Tournaments
                </x-nav-link>
            </div>

            {{-- Desktop Auth --}}
            <div class="hidden sm:flex items-center gap-3">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center gap-1 text-sm font-medium
                                       text-foreground hover:text-primary transition"
                            >
                                {{ Auth::user()->name }}
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 8l5 5 5-5" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium
                               bg-primary text-primary-foreground
                               hover:opacity-90 transition"
                    >
                        Login
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium
                               bg-secondary text-secondary-foreground
                               hover:opacity-90 transition"
                    >
                        Register
                    </a>
                @endauth
            </div>

            {{-- Mobile Toggle --}}
            <button
                @click="open = !open"
                class="sm:hidden p-2 rounded-md text-muted-foreground
                       hover:bg-muted focus:outline-none"
                aria-label="Toggle navigation"
            >
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Overlay --}}
    <div
        x-show="open"
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 z-40 bg-background/70 backdrop-blur sm:hidden"
    ></div>

    {{-- Mobile Drawer --}}
    <div
        x-show="open"
        x-transition
        class="fixed top-0 right-0 z-50 h-full w-72
               bg-card text-card-foreground
               border-l border-border shadow-xl sm:hidden"
    >
        <div class="flex items-center justify-between p-4 border-b border-border">
            <span class="font-semibold">Menu</span>
            <button
                @click="open = false"
                class="text-muted-foreground hover:text-foreground"
            >
                ✕
            </button>
        </div>

        <div class="flex flex-col gap-1 p-4">
            <x-responsive-nav-link
                :href="route('home')"
                :active="request()->routeIs('home')"
            >
                Home
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('tournaments.index')"
                :active="request()->routeIs('tournaments.*')"
            >
                Tournaments
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link
                    :href="route('profile.edit')"
                    :active="request()->routeIs('profile.edit')"
                >
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Log Out
                    </x-responsive-nav-link>
                </form>
            @else
                <x-responsive-nav-link :href="route('login')">
                    Login
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('register')">
                    Register
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>
