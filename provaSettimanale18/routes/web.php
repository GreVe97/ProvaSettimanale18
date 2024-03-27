<?php

use App\Http\Controllers\AttivitaController;

use App\Http\Controllers\CorsoController;
use App\Http\Controllers\PrenotazioniController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/attivita', AttivitaController::class);
    Route::resource('/corsi', CorsoController::class);
});

 Route::middleware([AdminMiddleware::class])->group(function () {
        Route::resource('/attivita', AttivitaController::class)->except(['index', 'show']);
        Route::resource('/corsi', CorsoController::class)->except(['index', 'show']);
    });
Route::resource('/prenotazioni', PrenotazioniController::class) ->middleware(['auth', 'verified']);

Route::get('/prenotazioniUtenti', [PrenotazioniController::class, 'prenotazioniUtenti'])
->middleware(['auth', 'verified',AdminMiddleware::class])
->name("prenotazioniUtenti");
require __DIR__.'/auth.php';
