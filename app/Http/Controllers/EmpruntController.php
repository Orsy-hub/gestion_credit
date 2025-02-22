<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;

class EmpruntController extends Controller
{
    //
    public function index () {
        // Filtre tous les emprunts en relation avec l'emprunteur
        $emprunts = Emprunts::whereHas('emprunteur', function($query) {
            // Applique le filtre sur la table users en gardant uniquement
            $query->where('role', 'Emprunteur');
        })->whereHas('bayeur', function ($query) {
            $query->where('role', 'Bayeur');
        })->get();

        // La vue qui va recevoir les emprunts
        return view('index');
    }

    public function store (Request $request) {
        // 
        $validated = $request->validate([
            'montant' => 'required|numeric|min:100',
            'date_emprunt' => 'required|date|after:montant',
            'offre_pret_id' => 'required|exists:offres_pret,id'
        ]);

        $user_id = Auth::user()->id;    // Récupérer l'id de l'utilisateur connecté

        // Si la validation c'est bien faite, création de l'Emprunt
        Emprunt::create([
            'emprunteur_id' => $user_id,
            'montant' => $validated['montant'],
            'date_emprunt' => now(),
            'offre_pret_id' => $validated['offre_pret_id'],  // Vérifier que l'offre existe
        ]);
    }
}
