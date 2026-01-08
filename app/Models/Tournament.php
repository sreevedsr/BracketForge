<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TournamentStatus;


class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'type',
        'status',
        'max_teams',
        'qualified_teams',
        'starts_at',
        'ends_at',
    ];
    protected $casts = [
        'status' => TournamentStatus::class,
    ];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }

    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_id');
    }


}
