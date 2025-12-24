<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight">
            Create Tournament
        </h2>
    </x-slot>

    <div class="bg-muted min-h-screen py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Form Card --}}
            <div
                class="bg-card text-card-foreground
                       rounded-2xl shadow-xl border border-border
                       p-6 sm:p-8 lg:p-10"
            >
                <form
                    method="POST"
                    action="{{ route('tournaments.store') }}"
                    x-data="tournamentForm()"
                >
                    @csrf

                    {{-- Tournament Name --}}
                    <div class="mb-6">
                        <label class="block font-medium mb-2">
                            Tournament Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            required
                            placeholder="Enter tournament name"
                            class="w-full rounded-lg border border-input bg-background px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-ring"
                        >
                    </div>

                    {{-- Description --}}
                    <div class="mb-6">
                        <label class="block font-medium mb-2">
                            Description
                        </label>
                        <textarea
                            name="description"
                            rows="3"
                            placeholder="Tournament description (optional)"
                            class="w-full rounded-lg border border-input bg-background px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-ring"
                        ></textarea>
                    </div>

                    {{-- Tournament Type --}}
                    <div class="mb-6">
                        <label class="block font-medium mb-2">
                            Tournament Type
                        </label>
                        <select
                            name="type"
                            x-model="type"
                            required
                            class="w-full rounded-lg border border-input bg-background px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-ring"
                        >
                            <option value="">Select type</option>
                            <option value="knockout">Knockout</option>
                            <option value="league">League</option>
                            <option value="round_robin">Round Robin</option>
                            <option value="hybrid">League + Knockout</option>
                        </select>
                    </div>

                    {{-- Teams --}}
                    <div class="mb-8">
                        <label class="block font-medium mb-3">
                            Number of Teams:
                            <span class="font-semibold" x-text="teamsCount"></span>
                        </label>

                        <div class="flex items-center gap-3 mb-5">
                            <button
                                type="button"
                                @click="decrease()"
                                class="px-3 py-2 rounded-lg bg-secondary text-secondary-foreground
                                       hover:opacity-90 transition"
                            >
                                −
                            </button>

                            <input
                                type="text"
                                readonly
                                x-model="teamsCount"
                                class="w-20 text-center rounded-lg border border-input bg-background px-3 py-2"
                            >

                            <button
                                type="button"
                                @click="increase()"
                                class="px-3 py-2 rounded-lg bg-secondary text-secondary-foreground
                                       hover:opacity-90 transition"
                            >
                                +
                            </button>
                        </div>

                        {{-- Team Inputs --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <template x-for="i in teamsCount" :key="i">
                                <div>
                                    <label class="block text-sm font-medium mb-1">
                                        Team <span x-text="i"></span>
                                    </label>
                                    <input
                                        type="text"
                                        :name="`teams[${i - 1}]`"
                                        required
                                        placeholder="Enter team name"
                                        class="w-full rounded-lg border border-input bg-background px-4 py-2
                                               focus:outline-none focus:ring-2 focus:ring-ring"
                                    >
                                </div>
                            </template>
                        </div>
                    </div>

                    {{-- Qualified Teams (only for league / hybrid) --}}
                    <div
                        class="mb-6"
                        x-show="type === 'league' || type === 'hybrid'"
                        x-transition
                    >
                        <label class="block font-medium mb-2">
                            Teams Qualifying for Knockouts
                        </label>
                        <input
                            type="number"
                            name="qualified_teams"
                            min="1"
                            :max="teamsCount"
                            placeholder="e.g. 4"
                            class="w-full rounded-lg border border-input bg-background px-4 py-2
                                   focus:outline-none focus:ring-2 focus:ring-ring"
                        >
                        <p class="text-sm text-muted-foreground mt-1">
                            Optional — used for league or hybrid tournaments
                        </p>
                    </div>

                    {{-- Schedule (Optional) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block font-medium mb-2">
                                Start Date
                            </label>
                            <input
                                type="datetime-local"
                                name="starts_at"
                                class="w-full rounded-lg border border-input bg-background px-4 py-2
                                       focus:outline-none focus:ring-2 focus:ring-ring"
                            >
                        </div>

                        <div>
                            <label class="block font-medium mb-2">
                                End Date
                            </label>
                            <input
                                type="datetime-local"
                                name="ends_at"
                                class="w-full rounded-lg border border-input bg-background px-4 py-2
                                       focus:outline-none focus:ring-2 focus:ring-ring"
                            >
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4 border-t border-border">
                        <button
                            type="submit"
                            class="w-full sm:w-auto px-8 py-3 rounded-xl
                                   bg-primary text-primary-foreground
                                   font-semibold shadow-lg hover:opacity-90 transition"
                        >
                            Create Tournament
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Alpine --}}
    <script>
        function tournamentForm() {
            return {
                type: '',
                teamsCount: 2,
                increase() {
                    if (this.teamsCount < 32) this.teamsCount++
                },
                decrease() {
                    if (this.teamsCount > 2) this.teamsCount--
                }
            }
        }
    </script>
</x-app-layout>
