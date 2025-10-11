<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ $tournament->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 transition-colors duration-300">
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Description:</strong>
                    {{ $tournament->description ?? 'No description' }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Start Date:</strong> {{ $tournament->start_date }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>End Date:</strong> {{ $tournament->end_date ?? 'TBD' }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Created by:</strong> {{ $tournament->creator?->name ?? 'Unknown' }}</p>

                <ul class="text-gray-700 dark:text-gray-300 list-disc list-inside">
                    @foreach(json_decode($tournament->participants) ?? [] as $p)
                        <li>{{ $p }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
