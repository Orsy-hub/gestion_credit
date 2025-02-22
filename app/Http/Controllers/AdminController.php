<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Fonction pour se rendre sur la page admin.
    public function index(){
        if (!session()->has('admin')) {
            return redirect('admin/auth')->with('error', "Seul les admins ont acces a cette page");
        }

        // Recupration de la liste des utilisateurs en attente
        // de validation.
        $usersNonVerifies = User::where('verifier', 0)->get();
        // Recuperation du nombre total d'utilisateur en attente
        // de validation.
        $validationCount = $usersNonVerifies->count();
        return view('admin.admin', compact('usersNonVerifies', 'validationCount'));
    }

    // Fonction pour se rendre sur le formulaire de 
    // connexion de l'admin.
    public function login(){
        return view('admin.adminAuth');
    }

    // Fonction pour authentifier l'admin.
    public function auth(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'raven' && $password === '1234') {
            $admin = session(['admin' => [
                'username' => 'raven',
                'password' => 1234,
                'email' => 'neo.kami.raven@gmail.com'
            ]]);
            
            return redirect()->route('admin.index');
        }
        return back()->withErrors(['msg' => "Identifiants incorrects"]);
    }

    // Methode pour valider la demande d'inscription d'un utilisateur.
    public function validate($id_user){
        // Recuperation de l'utilisateur.
        $user = User::find($id_user);

        // Verification que l'utilisateur a ete trouve.
        if (!$user) {
            return back()->with(['error' => "Utilisateur non trouve!"], 404);
        }
        // Si l'utilisateur est trouve on le met a jour.
        $user->verifier = 1;
        $user->save();
        return back()->with(['success' => "Utilisateur vérifié avec succès"]);
    }

    // Methode pour la deconnexion de l'admin
    public function logout(){
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
