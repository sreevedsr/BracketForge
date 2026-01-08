<?php

namespace App\Enums;

enum FixtureStatus: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
}
