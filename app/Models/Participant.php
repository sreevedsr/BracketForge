<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'name',
        'email',
        'phone',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

