<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tournaments') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            @foreach($tournaments as $tournament)
                <div class="border-b py-2">
                    <a href="{{ route('tournaments.show', $tournament->id) }}" class="text-purple-600 hover:underline">
                        {{ $tournament->name }}
                    </a>
                    <span class="text-gray-500 text-sm">({{ $tournament->start_date }} - {{ $tournament->end_date ?? 'TBD' }})</span>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
