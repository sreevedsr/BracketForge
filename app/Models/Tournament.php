<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'format',
        'participants_count',
        'participants',
    ];

    protected $casts = [
        'participants' => 'array', // automatically cast JSON to array
    ];
}
