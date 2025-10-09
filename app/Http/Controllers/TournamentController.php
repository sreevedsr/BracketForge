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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'format' => 'required|string|max:100',
            'participants_count' => 'required|integer|min:1',
            'participants.*' => 'required|string|max:255',
        ]);

        // store participants as JSON
        $participants = $data['participants'];

        Tournament::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'format' => $data['format'],
            'participants_count' => $data['participants_count'],
            'participants' => $participants,
        ]);

        return redirect()->route('tournaments.create')->with('success', 'Tournament created successfully!');
    }
}
