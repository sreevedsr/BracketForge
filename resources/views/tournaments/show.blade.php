<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-2xl font-semibold leading-tight">
                {{ $tournament->name }}
            </h2>
            <p class="text-sm text-muted-foreground">
                Tournament details
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Tournament Info --}}
            <div
                class="bg-card text-card-foreground
                       rounded-2xl border border-border shadow-sm p-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">

                    <div>
                        <dt class="font-medium">Description</dt>
                        <dd class="text-muted-foreground">
                            {{ $tournament->description ?? 'No description provided' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="font-medium">Type</dt>
                        <dd class="text-muted-foreground capitalize">
                            {{ str_replace('_', ' ', $tournament->type) }}
                        </dd>
                    </div>

                    <div>
                        <dt class="font-medium">Start Date</dt>
                        <dd class="text-muted-foreground">
                            {{ $tournament->starts_at?->format('d M Y, h:i A') ?? 'Not scheduled' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="font-medium">End Date</dt>
                        <dd class="text-muted-foreground">
                            {{ $tournament->ends_at?->format('d M Y, h:i A') ?? 'Not scheduled' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="font-medium">Status</dt>
                        <dd>
                            <span
                                class="inline-flex items-center rounded-full
                                       bg-secondary px-3 py-1 text-xs font-medium
                                       text-secondary-foreground">
                                {{ ucfirst($tournament->status) }}
                            </span>
                        </dd>
                    </div>

                    <div>
                        <dt class="font-medium">Total Teams</dt>
                        <dd class="text-muted-foreground">
                            {{ $tournament->teams->count() }}
                        </dd>
                    </div>

                </dl>
            </div>

            {{-- Teams List --}}
            <div
                class="bg-card text-card-foreground
                       rounded-2xl border border-border shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">
                    Teams
                </h3>

                @if ($tournament->teams->isEmpty())
                    <p class="text-muted-foreground text-sm">
                        No teams added yet.
                    </p>
                @else
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($tournament->teams as $team)
                            <li
                                class="rounded-xl border border-border
                                       bg-background px-4 py-3 flex items-center justify-between">
                                <span class="font-medium">
                                    {{ $team->name }}
                                </span>
                                <span class="text-xs text-muted-foreground">
                                    Team {{ $team->seed }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            {{-- Fixtures --}}
            <div class="bg-card text-card-foreground
           rounded-2xl border border-border shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">
                    Fixtures
                </h3>

                @if ($tournament->fixtures->isEmpty())
                    <p class="text-sm text-muted-foreground">
                        Fixtures have not been generated yet.
                    </p>
                @else
                    <div class="space-y-4">
                        @foreach ($tournament->fixtures->groupBy('round') as $round => $fixtures)
                            <div>
                                <h4 class="text-sm font-medium mb-2">
                                    Round {{ $round }}
                                </h4>

                                <ul class="space-y-2">
                                    @foreach ($fixtures as $fixture)
                                        <li class="rounded-xl border border-border bg-background p-4">
                                            <div class="flex items-center justify-between gap-4">
                                                <span class="font-medium">
                                                    {{ $fixture->homeTeam->name }}
                                                </span>

                                                <span class="text-sm text-muted-foreground">
                                                    vs
                                                </span>

                                                <span class="font-medium">
                                                    {{ $fixture->awayTeam->name }}
                                                </span>
                                            </div>

                                            @if ($fixture->status === 'completed')
                                                <div class="mt-3 text-sm flex items-center justify-between">
                                                    <span>
                                                        {{ $fixture->home_score }} - {{ $fixture->away_score }}
                                                    </span>

                                                    <span class="text-xs text-muted-foreground">
                                                        Winner: {{ $fixture->winner?->name ?? 'Draw' }}
                                                    </span>
                                                </div>
                                            @else
                                                {{-- Score Form (admin/owner only later) --}}
                                                <form method="POST"
                                                    action="{{ route('fixtures.result.store', $fixture) }}"
                                                    class="mt-3 flex items-center gap-2">
                                                    @csrf

                                                    <input type="number" name="home_score" min="0" required
                                                        class="w-16 rounded-md border border-input bg-background px-2 py-1">

                                                    <span class="text-sm">-</span>

                                                    <input type="number" name="away_score" min="0" required
                                                        class="w-16 rounded-md border border-input bg-background px-2 py-1">

                                                    <button type="submit"
                                                        class="ml-auto px-3 py-1 rounded-md
                       bg-primary text-primary-foreground text-sm">
                                                        Save
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
