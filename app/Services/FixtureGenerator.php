<?php

namespace App\Services;

use App\Models\Tournament;

class FixtureGenerator
{
    public static function generate(Tournament $tournament): void
    {
        match ($tournament->type) {
            'knockout'    => self::knockout($tournament),
            'round_robin' => self::roundRobin($tournament),
            'league'      => self::roundRobin($tournament),
            'hybrid'      => self::roundRobin($tournament), // knockout later
            default       => null,
        };
    }

    /**
     * Knockout: seed-based pairing
     */
    protected static function knockout(Tournament $tournament): void
    {
        $teams = $tournament->teams()
            ->orderBy('seed')
            ->get()
            ->values();

        $round = 1;

        for ($i = 0; $i < $teams->count(); $i += 2) {
            if (!isset($teams[$i + 1])) {
                break; // odd team count → bye (handle later if needed)
            }

            $tournament->fixtures()->create([
                'home_team_id' => $teams[$i]->id,
                'away_team_id' => $teams[$i + 1]->id,
                'round' => $round,
            ]);
        }
    }

    /**
     * Round Robin / League: everyone vs everyone
     */
    protected static function roundRobin(Tournament $tournament): void
    {
        $teams = $tournament->teams()->get();
        $round = 1;

        for ($i = 0; $i < $teams->count(); $i++) {
            for ($j = $i + 1; $j < $teams->count(); $j++) {
                $tournament->fixtures()->create([
                    'home_team_id' => $teams[$i]->id,
                    'away_team_id' => $teams[$j]->id,
                    'round' => $round++,
                ]);
            }
        }
    }
}
