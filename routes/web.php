<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BayeurController;
use App\Http\Controllers\EmprunteurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashEmprunt', [DashboardController::class, 'emprunteur'])->name('dashEmprunt');
    Route::get('/dashBayeur', [DashboardController::class, 'bayeur'])->name('dashBayeur');
});


// Authentification de l'admin.
Route::get('/adminAuth', function () {
    return view('admin.adminAuth'); // Page d'authentification
})->name('adminAuth');
Route::post('/adminAuth', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'raven' && $password === '1234') {
        session(['user' => $username]); // Stocker la session utilisateur
        return redirect()->route('admin'); // Rediriger vers admin
    } else {
        return back()->withErrors(['msg' => 'Identifiants incorrects']);
    }
});

// Connexion a l'admin si l'authentification est correct.
Route::get('/admin', function () {
    if (!session()->has('user')) {
        return redirect()->route('adminAuth'); // Rediriger si non connecté
    }
    return view('admin.admin'); // Page admin
})->name('admin');

// Deconnexion a l'admin.
Route::get('/adminLogout', function () {
    session()->forget('user'); // Détruire la session
    return redirect()->route('adminAuth'); // Rediriger vers login
})->name('adminLogout');
// -----------------------------------------------



require __DIR__.'/auth.php';
