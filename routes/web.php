<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BayeurController;
use App\Http\Controllers\EmprunteurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route des Admin protégé
// Route::middleware(['auth', 'admin'])->group(function(){
//     Route::get('/admin',[AdminController::class, 'dashboardAdmin'])->name('admin.dashAdmin');
// });

Route::get('/admin', function (){
    return view('dashAdmin');
})->middleware('admin');
// Route pour le Bayeur
Route::middleware(['auth'])->group(function () {
    Route::get('/bayeur/dashboard', [BayeurController::class, 'dashboard'])->name('bayeur.dashboard');
});

// Route pour l'Emprunteur
Route::middleware(['auth'])->group(function () {
    Route::get('/emprunteur/dashboard', [EmprunteurController::class, 'dashboard'])->name('emprunteur.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
