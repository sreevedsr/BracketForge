<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\FixtureResultController;


Route::get('/', [HomeController::class, 'index'])->name('home');



// Protected routes (only logged-in users)
Route::middleware('auth')->group(function () {
    Route::get('tournaments/create', [TournamentController::class, 'create'])->name('tournaments.create');
    Route::post('tournaments', [TournamentController::class, 'store'])->name('tournaments.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Public routes (anyone can view)
Route::get('tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('tournaments/{tournament}', [TournamentController::class, 'show'])
    ->whereNumber('tournament')
    ->name('tournaments.show');

Route::post(
    '/fixtures/{fixture}/result',
    [FixtureResultController::class, 'store']
)->name('fixtures.result.store');


// Dashboard (authenticated + verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
