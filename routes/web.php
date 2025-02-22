<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BayeurController;
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\OffrePretController;

// Route Pour gerer l'inscription des utilisateur (Bayeur, Emprunteur).
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');


// Afficher le formulaire de connexion.
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Traiter la connexion.
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// Route pour deconnecter les utilisateurs (Bayeur, Emprunteur).
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashEmprunt', [DashboardController::class, 'emprunteur'])->name('dashEmprunteur');
    Route::get('/dashBayeur', [DashboardController::class, 'bayeur'])->name('dashBayeur');
});

// Route de direction vers la page d'accueil.
Route::get('/', [Homecontroller::class, 'index'])->middleware('auth')->name('home');

// Route de direction vers la page des contracts.
Route::get('/contracts', function (){
    return view('contracts.index');
})->name('contracts');

// Route de direction vers la page d'offres.
Route::get('/offres', [OffrePretController::class, 'index'])->name('offres.index');
// Route pour la creation de nouvelle offre d'emprunt.
Route::post('/offres', [OffrePretController::class, 'store'])->name('offres.store');
// Route pour effectuer la suppression de l'offre.
Route::post('/offres/delete/{id}', [OffrePretController::class, 'destroy'])->name('offres.delete');
// Route pour la modification d'une offre.
Route::put('/offres/{id}', [OffrePretController::class, 'update'])->name('offres.update');



// Route pour avoir acces a la page admin. (Apres s'etre authentifier)
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route pour avoir acces a la page d'authentification.
Route::get('/admin/auth', [AdminController::class, 'login'])->name('admin.login');
// Route pour le traitement de l'authentification.
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
// Route pour la deconnexion de l'admin.
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Route pour confirmer la demande d'inscription d'un utilisateur.
Route::get('/admin/{id_user}', [AdminController::class, 'validate'])->name('admin.validate');

































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
// Route::get('/adminAuth', function () {
//     return view('admin.adminAuth'); // Page d'authentification
// })->name('adminAuth');
// // Route de traitement des informations d'authentification 
// // de l'admin.
// Route::post('/adminAuth', function (Request $request) {
//     $username = $request->input('username');
//     $password = $request->input('password');

//     if ($username === 'raven' && $password === '1234') {
//         session(['user' => $username]); // Stocker la session utilisateur
//         return redirect()->route('admin'); // Rediriger vers admin
//     } else {
//         return back()->withErrors(['msg' => 'Identifiants incorrects']);
//     }
// });


// // Route de direction vers la page de l'Admin (Si l'authentification est correct).
// Route::get('/admin', function () {
//     if (!session()->has('user')) {
//         return redirect()->route('adminAuth'); // Rediriger si non connecté a 
//                                             // la page d'authentification.
//     }
//     return view('admin.admin'); // Page admin
// })->name('admin');

// // Deconnexion a l'admin.
// Route::get('/adminLogout', function () {
//     session()->forget('user'); // Détruire la session
//     return redirect()->route('adminAuth'); // Rediriger vers login
// })->name('adminLogout');
