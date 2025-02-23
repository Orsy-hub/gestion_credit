<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
<<<<<<< HEAD
use App\Models\OffrePret;
=======
>>>>>>> feature/responsif
use Illuminate\Http\Request;
use App\Models\User;

class EmpruntController extends Controller
{

    public function create () {
        return view('emprunteurs.create');
    }
    //
    public function index () {

        // Récupérer tous les emprunts leurs bayeurs et emprunteurs
        $emprunts = Emprunt::whereHas('emprunteur', function($query) {
            $query->where('role', 'Emprunteur');
        })->whereHas('bayeur', function ($query) {
            $query->where('role', 'Bayeur');
        })->get();


        // La vue qui va recevoir les emprunts
        return view('emprunts.index', compact('emprunts'));
    }


    // Fonction pour enregistrer les emprunts
    public function store(Request $request)
    {
        // Recuperation des informations de l'offre.
        $offreId = $request->input('offre_id');
        $offre = OffrePret::with('bayeur')->find($offreId);

        // Recuperation de l'information de l'Id de l'emprunteur.
        $emprunteur_id = $request->input('emprunteur_id');

        // Creation de l'emprunt.
        $emprunt_data = [
            'emprunteur_id' => $emprunteur_id,
            'offre_pret_id' => $offre->id,
            'montant' => $offre->montant,
            'date_emprunt' => now(),
        ];

        // Creation de l'emprunt.
        $emprunt = Emprunt::create($emprunt_data);

        // Mise a jour du solde de l'emprunteur.
        $emprunteur = User::find($emprunteur_id);
        $emprunteur->solde = $emprunt->montant;
        $emprunteur->save();

        // Mise a jour du solde du Bayeur.
        $offre->bayeur->solde -= $emprunt->montant;
        $offre->bayeur->save();


        // // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Emprunt créé avec succès.');
    }

}
