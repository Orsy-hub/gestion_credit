<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

class EmprunteurController extends Controller
{
    //
    public function dashboard (){
        $user = Auth::user();
        if (!user->isEmprunteur()) {
            return redirect('/login')->with('error', 'Accès refusé');
        }
        return view('emprunteur.dashemprunteur', compact('user'));
    }
}
