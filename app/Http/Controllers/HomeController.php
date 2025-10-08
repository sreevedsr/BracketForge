<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class HomeController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::latest()->get();

        $recentTournaments = auth()->check() 
            ? auth()->user()->recentlyViewedTournaments ?? collect() 
            : collect();

        return view('home', compact('tournaments', 'recentTournaments'));
    }
}
