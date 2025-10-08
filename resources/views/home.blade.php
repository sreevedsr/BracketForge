<x-app-layout>
    <!-- Banner Section -->
    <div class="relative bg-gray-100 dark:bg-gray-800">
        <div class="h-64 sm:h-80 md:h-96 flex items-center justify-center bg-cover bg-center relative"
            style="background-image: url('{{ asset('images/banner (2).jpg') }}');">

            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-55"></div>

            <!-- Heading -->
            <div class="relative text-center mx-4 sm:mx-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-white">Welcome to BracketForge</h1>
                <p class="mt-2 text-white/80 sm:text-lg">Create, join, and view tournaments with ease</p>
            </div>
        </div>
    </div>

    <!-- Full-width Tournament Section (Overlapping Banner) -->
    <section
        class="bg-gray-50 dark:bg-gray-950 py-12 px-4 sm:px-6 lg:px-8 -mt-16 sm:-mt-20 rounded-t-3xl shadow-xl relative z-10">
        <div class="max-w-6xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-gray-100">All Tournaments</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Browse all available tournaments below</p>
            </div>

            <!-- Tournament Grid -->
            @if($tournaments->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($tournaments as $tournament)
                        <div
                            class="bg-white dark:bg-gray-900 shadow-md hover:shadow-lg rounded-xl p-6 border border-gray-200 dark:border-gray-700 transition">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">
                                {{ $tournament->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                                {{ Str::limit($tournament->description ?? 'No description available', 80) }}
                            </p>
                            <a href="{{ route('tournaments.show', $tournament->id) }}"
                                class="inline-block px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold rounded-lg transition">
                                View Details
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-gray-600 dark:text-gray-400 py-12">
                    <p class="text-lg">No tournaments have been created yet.</p>
                </div>
            @endif
        </div>
    </section>


    <!-- Desktop Sticky Buttons -->
    <div class="hidden md:flex fixed bottom-0 left-0 right-0 bg-transparent shadow-none p-4 justify-center gap-4 z-40">
        @auth
            <a href="{{ route('tournaments.create') }}"
                class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-lg transition">
                Create Tournament
            </a>
        @endauth
        <a href="{{ route('tournaments.index') }}"
            class="px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 font-semibold rounded-lg transition">
            View Tournaments
        </a>
    </div>

    <!-- Mobile Floating Button and Bottom Sheet -->
    <div x-data="{ open: false }" class="sm:hidden fixed bottom-6 right-6 z-50">
        <!-- Floating Action Button -->
        <button @click="open = true"
            class="w-14 h-14 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-xl flex items-center justify-center transition transform active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </button>

        <!-- Overlay -->
        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-40">
        </div>

        <!-- Bottom Sheet -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            class="fixed bottom-0 left-0 w-full bg-white dark:bg-gray-900 rounded-t-2xl shadow-2xl z-50 p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Tournament Actions</h3>
                <button @click="open = false"
                    class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-2xl leading-none">
                    &times;
                </button>
            </div>

            <div class="space-y-3">
                @auth
                    <a href="{{ route('tournaments.create') }}"
                        class="block w-full px-4 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-center font-semibold rounded-lg transition">
                        Create Tournament
                    </a>
                @endauth
                <a href="{{ route('tournaments.index') }}"
                    class="block w-full px-4 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 text-center font-semibold rounded-lg transition">
                    View Tournaments
                </a>
            </div>
        </div>
    </div>
</x-app-layout>