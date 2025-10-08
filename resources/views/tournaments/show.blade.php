<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $tournament->name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-700 mb-2"><strong>Description:</strong> {{ $tournament->description ?? 'No description' }}</p>
            <p class="text-gray-700 mb-2"><strong>Start Date:</strong> {{ $tournament->start_date }}</p>
            <p class="text-gray-700 mb-2"><strong>End Date:</strong> {{ $tournament->end_date ?? 'TBD' }}</p>
            <p class="text-gray-700 mb-2"><strong>Created by:</strong> {{ $tournament->creator?->name ?? 'Unknown' }}</p>
        </div>
    </div>
</x-app-layout>
