<?php

namespace App\Http\Controllers;

use App\Services\FixtureGenerator;
use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    /**
     * List tournaments (public / invited logic can come later)
     */
    public function index()
    {
        $tournaments = Tournament::latest()->get();

        return view('tournaments.index', compact('tournaments'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store tournament using new schema
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:league,round_robin,knockout,hybrid',
            'teams' => 'required|array|min:2',
            'teams.*' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($validated) {

            // 1️⃣ Create Tournament
            $tournament = Tournament::create([
                'user_id' => auth()->id(),
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'type' => $validated['type'],
                'status' => 'draft',
                'max_teams' => count($validated['teams']),
            ]);

            // 2️⃣ Create Teams (USER-DEFINED)
            foreach ($validated['teams'] as $index => $teamName) {
                $tournament->teams()->create([
                    'name' => $teamName,
                    'seed' => $index + 1,
                ]);
            }

            FixtureGenerator::generate($tournament);

        });

        return redirect()
            ->route('tournaments.index')
            ->with('success', 'Tournament created successfully!');
    }


    /**
     * Show a tournament (route-model binding)
     */
    public function show(Tournament $tournament)
    {
        $tournament->load([
            'teams',
            'fixtures.homeTeam',
            'fixtures.awayTeam',
        ]);

        return view('tournaments.show', compact('tournament'));
    }

}
