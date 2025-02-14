<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Utilisateur;
use Illuminate\Support\Facades\Auth;

class BayeurController extends Controller
{
    //
    public function dashboard () {
        $user = Auth::user();

        if (!user->isBayeur()) {
            return redirect('/login')->with('error', 'Accès refusé');
        }
        return view('bayeur.dashBayeur', compact('user'));
    }


}
