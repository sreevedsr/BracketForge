<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function create()
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'format' => 'required|string',
            'participants' => 'required|array|min:2',
            'participants.*' => 'required|string|max:255',
        ]);

        Tournament::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'format' => $validated['format'],
            'participants_count' => count($validated['participants']),
            'participants' => json_encode($validated['participants']),
        ]);

        return redirect()->route('home')->with('success', 'Tournament created successfully!');
    }

    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.show', compact('tournament'));
    }

}
