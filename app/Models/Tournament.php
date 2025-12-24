<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }

}
