<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tournament') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6 border-l-4" style="border-color: #4338CA;">
            <form method="POST" action="{{ route('tournaments.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Tournament Name</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2 focus:border-[#4338CA] focus:ring-1 focus:ring-[#818CF8]" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2 focus:border-[#4338CA] focus:ring-1 focus:ring-[#818CF8]"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Start Date</label>
                    <input type="date" name="start_date" class="w-full border rounded px-3 py-2 focus:border-[#4338CA] focus:ring-1 focus:ring-[#818CF8]" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                    <input type="date" name="end_date" class="w-full border rounded px-3 py-2 focus:border-[#4338CA] focus:ring-1 focus:ring-[#818CF8]">
                </div>

                <button type="submit" 
                        class="px-4 py-2 rounded font-semibold text-white transition-colors duration-300"
                        style="background: #4338CA;"
                        onmouseover="this.style.background='#818CF8'" 
                        onmouseout="this.style.background='#4338CA'">
                    Create Tournament
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
