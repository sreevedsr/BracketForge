<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    // Show all tournaments
    public function index()
    {
        $tournaments = Tournament::latest()->get();
        return view('tournaments.index', compact('tournaments'));
    }

    // Show create form
    public function create()
    {
        return view('tournaments.create');
    }

    // Store new tournament
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Tournament::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tournaments.index')->with('success', 'Tournament created successfully!');
    }

    // Show single tournament
    public function show(Tournament $tournament)
    {
        return view('tournaments.show', compact('tournament'));
    }
}
