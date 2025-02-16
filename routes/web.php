<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BayeurController;
use App\Http\Controllers\EmprunteurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route de direction vers la page d'accueil.
Route::get('/', function () {
    return view('home.index');
})->name('home');

// Route de direction vers la page des contracts.
Route::get('/contracts', function (){
    return view('contracts.index');
})->name('contracts');


/*
    Mise en place du systeme d'authentification de 
    l'Admin (Mr Mouhamed)
    Pour ce rendre sur la page d'Admin il faut sur la bar d'Address
    saisir : localhost:{numero_de_port}/admin
    Ensuite l'utilisateur est redirige vers une page d'admin
    Si l'authentification se passe bien en renvoi l'utilisateur
    vers la page admin sinon interdiction d'acces

*/ 
// Route de direction vers Authentification de l'admin.
Route::get('/adminAuth', function () {
    return view('admin.adminAuth'); // Page d'authentification
})->name('adminAuth');
// Route de traitement des informations d'authentification 
// de l'admin.
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


// Route de direction vers la page de l'Admin (Si l'authentification est correct).
Route::get('/admin', function () {
    if (!session()->has('user')) {
        return redirect()->route('adminAuth'); // Rediriger si non connecté a 
                                            // la page d'authentification.
    }
    return view('admin.admin'); // Page admin
})->name('admin');

// Deconnexion a l'admin.
Route::get('/adminLogout', function () {
    session()->forget('user'); // Détruire la session
    return redirect()->route('adminAuth'); // Rediriger vers login
})->name('adminLogout');












require __DIR__.'/auth.php';
