<x-app-layout>
    <!-- Banner Section -->
    <div class="relative bg-gray-100 dark:bg-gray-800">
        <div class="h-64 sm:h-80 md:h-96 flex items-center justify-center bg-cover bg-center relative"
            style="background-image: url('{{ asset('images/banner (2).jpg') }}');">

            <!-- Dark overlay on the image -->
            <div class="absolute inset-0 bg-black bg-opacity-55"></div>

            <!-- Heading without box -->
            <div class="relative text-center mx-4 sm:mx-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-white">Welcome to BracketForge</h1>
                <p class="mt-2 text-white/80 sm:text-lg">Create, join, and view tournaments with ease</p>
            </div>
        </div>
    </div>


    <!-- Content Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        <!-- Recently Viewed Tournaments -->
        @auth
            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Recently Viewed Tournaments</h2>
                @if($recentTournaments->count() > 0)
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        @foreach($recentTournaments as $tournament)
                            <li>
                                <a href="{{ route('tournaments.show', $tournament->id) }}"
                                    class="hover:underline text-indigo-600 dark:text-indigo-400">
                                    {{ $tournament->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600 dark:text-gray-400">You haven't viewed any tournaments yet.</p>
                @endif
            </div>
        @endauth

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6">
            @auth
                <a href="{{ route('tournaments.create') }}"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-lg text-center transition">
                    Create Tournament
                </a>
            @endauth
            <a href="{{ route('tournaments.index') }}"
                class="px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 font-semibold rounded-lg text-center transition">
                View Tournaments
            </a>
        </div>

    </div>
</x-app-layout>