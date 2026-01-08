<?php

namespace App\Services;

use App\Models\Tournament;
use App\Enums\TournamentStatus;

class TournamentCompletionService
{
    public function evaluate(Tournament $tournament): void
    {
        // If any fixture is not completed → tournament not finished
        if ($tournament->fixtures()
            ->where('status', '!=', 'completed')
            ->exists()) {
            return;
        }

        $winner = $this->determineWinner($tournament);

        if (! $winner) {
            return;
        }

        $tournament->update([
            'status' => TournamentStatus::COMPLETED,
            'winner_id' => $winner->id,
        ]);
    }

    protected function determineWinner(Tournament $tournament)
    {
        return match ($tournament->type) {
            'knockout' => $this->knockoutWinner($tournament),
            'round_robin' => $this->leagueWinner($tournament),
            default => null,
        };
    }

    protected function knockoutWinner(Tournament $tournament)
    {
        return $tournament->fixtures()
            ->orderByDesc('round')
            ->first()
            ?->winner;
    }

    protected function leagueWinner(Tournament $tournament)
    {
        // Stub — you’ll replace this with standings logic
        return null;
    }
}
