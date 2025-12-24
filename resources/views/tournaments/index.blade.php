<x-app-layout>


    {{-- Page Wrapper --}}
    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Header --}}
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold">
                    Browse Tournaments
                </h2>
                <p class="mt-2 text-muted-foreground">
                    Explore all available tournaments below
                </p>
            </div>

            {{-- Tournament Grid --}}
            @if ($tournaments->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($tournaments as $tournament)
                        <div
                            class="bg-card text-card-foreground
                                   border border-border rounded-xl p-6
                                   transition hover:shadow-lg"
                        >
                            <h3 class="text-xl font-semibold mb-2">
                                {{ $tournament->name }}
                            </h3>

                            <p class="text-sm text-muted-foreground mb-4">
                                {{ Str::limit($tournament->description ?? 'No description available', 80) }}
                            </p>

                            <a
                                href="{{ route('tournaments.show', $tournament) }}"
                                class="inline-flex items-center px-4 py-2
                                       bg-primary text-primary-foreground
                                       rounded-lg text-sm font-medium
                                       hover:opacity-90 transition"
                            >
                                View Tournament
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 text-muted-foreground">
                    <p class="text-lg">
                        No tournaments have been created yet.
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{-- DESKTOP ACTION BAR (AUTH ONLY) --}}
    @auth
        <div
            class="hidden md:flex fixed bottom-0 inset-x-0 z-40
                   justify-center gap-4 p-4
                   bg-background/80 backdrop-blur
                   border-t border-border"
        >
            <a
                href="{{ route('tournaments.create') }}"
                class="px-6 py-3 bg-primary text-primary-foreground
                       rounded-lg font-medium hover:opacity-90 transition"
            >
                Create Tournament
            </a>

            <a
                href="{{ route('tournaments.index') }}"
                class="px-6 py-3 bg-secondary text-secondary-foreground
                       rounded-lg font-medium hover:opacity-90 transition"
            >
                Refresh List
            </a>
        </div>
    @endauth

    {{-- MOBILE FAB (AUTH ONLY) --}}
    @auth
        <div x-data="{ open: false }" class="md:hidden fixed bottom-6 right-6 z-50">
            <button
                @click="open = true"
                class="w-14 h-14 bg-primary text-primary-foreground
                       rounded-full shadow-xl flex items-center justify-center
                       transition active:scale-95"
            >
                +
            </button>

            {{-- Overlay --}}
            <div
                x-show="open"
                x-transition.opacity
                @click="open = false"
                class="fixed inset-0 bg-background/70 backdrop-blur z-40"
            ></div>

            {{-- Bottom Sheet --}}
            <div
                x-show="open"
                x-transition
                class="fixed bottom-0 left-0 w-full
                       bg-card text-card-foreground
                       rounded-t-2xl border-t border-border
                       shadow-2xl z-50 p-6"
            >
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Actions</h3>
                    <button
                        @click="open = false"
                        class="text-muted-foreground text-2xl"
                    >
                        &times;
                    </button>
                </div>

                <div class="space-y-3">
                    <a
                        href="{{ route('tournaments.create') }}"
                        class="block w-full px-4 py-3
                               bg-primary text-primary-foreground
                               rounded-lg text-center font-medium"
                    >
                        Create Tournament
                    </a>

                    <a
                        href="{{ route('tournaments.index') }}"
                        class="block w-full px-4 py-3
                               bg-secondary text-secondary-foreground
                               rounded-lg text-center font-medium"
                    >
                        Refresh List
                    </a>
                </div>
            </div>
        </div>
    @endauth
</x-app-layout>
