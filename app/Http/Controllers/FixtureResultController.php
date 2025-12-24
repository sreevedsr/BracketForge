<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;

class FixtureResultController extends Controller
{
    public function store(Request $request, Fixture $fixture)
    {
        $data = $request->validate([
            'home_score' => 'required|integer|min:0',
            'away_score' => 'required|integer|min:0',
        ]);

        $winnerId = null;

        if ($data['home_score'] > $data['away_score']) {
            $winnerId = $fixture->home_team_id;
        } elseif ($data['away_score'] > $data['home_score']) {
            $winnerId = $fixture->away_team_id;
        }

        $fixture->update([
            'home_score' => $data['home_score'],
            'away_score' => $data['away_score'],
            'winner_team_id' => $winnerId,
            'status' => 'completed',
        ]);

        return back()->with('success', 'Result saved.');
    }
}

