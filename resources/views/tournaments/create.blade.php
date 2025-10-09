<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-2xl leading-tight text-gray-900 dark:text-gray-100 transition-colors duration-300">
            Create Tournament
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-2xl p-8 border-l-4 border-indigo-600">
                <form method="POST" action="{{ route('tournaments.store') }}" x-data="tournamentForm()">
                    @csrf

                    <!-- Tournament Name -->
                    <div class="mb-6">
                        <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Tournament Name</label>
                        <input type="text" name="name"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter tournament name" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Description</label>
                        <textarea name="description"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Tournament description"></textarea>
                    </div>

                    <!-- Format -->
                    <div class="mb-6">
                        <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Format</label>
                        <select name="format"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="">Select Format</option>
                            <option value="Knockout">Knockout</option>
                            <option value="League">League</option>
                            <option value="Round Robin">Round Robin</option>
                        </select>
                    </div>

                    <div x-data="{ participantsCount: 2 }" class="mb-6">
                        <!-- Number of Participants -->
                        <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">
                            Number of Participants: <span x-text="participantsCount"></span>
                        </label>

                        <!-- Increment/Decrement Buttons -->
                        <div class="flex items-center space-x-2 mb-4">
                            <button type="button" @click="participantsCount = Math.max(2, participantsCount - 1)"
                                class="px-3 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                -
                            </button>

                            <input type="text" readonly x-model="participantsCount"
                                class="w-20 text-center border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none">

                            <button type="button" @click="participantsCount = Math.min(32, participantsCount + 1)"
                                class="px-3 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                +
                            </button>
                        </div>

                        <!-- Participant Name Inputs -->
                        <template x-for="i in participantsCount" :key="i">
                            <div class="mb-4">
                                <label class="block text-gray-700 dark:text-gray-200 font-medium">
                                    Participant <span x-text="i"></span>
                                </label>
                                <input type="text" :name="'participants[' + (i-1) + ']'"
                                    class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Enter participant name" required>
                            </div>
                        </template>
                    </div>



                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-4 w-full px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                        Create Tournament
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function tournamentForm() {
            return {
                participantsCount: 2 // default participants
            }
        }
    </script>
</x-app-layout>