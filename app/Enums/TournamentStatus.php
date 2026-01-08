<?php

namespace App\Enums;

enum TournamentStatus: string
{
    case DRAFT = 'draft';
    case ONGOING = 'ongoing';
    case COMPLETED = 'completed';
    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::ONGOING => 'Ongoing',
            self::COMPLETED => 'Completed',
        };
    }
}
