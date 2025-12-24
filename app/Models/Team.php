<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'name',
        'seed',
        'is_active',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
