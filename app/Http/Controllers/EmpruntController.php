<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    //
    public function index () {
        // Récupérer tous les emprunts leurs bayeurs et emprunteurs
        $emprunts = Emprunts::whereHas('emprunteur', function($query) {
            $query->where('role', 'Emprunteur');
        })->whereHas('bayeur', function ($query) {
            $query->where('role', 'Bayeur');
        })->get();
        
        // La vue qui va recevoir les emprunts
        return view('index');
    }
}
