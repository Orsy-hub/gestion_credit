<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpruntController extends Controller
{

    public function create () {
        return view('emprunteurs.create');
    }
    //
    public function index () {
        // Filtre  les emprunts en fonction de la relation avec l'emprunteur
        $emprunts = Emprunts::whereHas('emprunteur', function($query) {

            // Applique un filtre sur la table users en gardant uniquement ceux dont le rôle est emprunteur
            $query->where('role', 'Emprunteur');
        })->whereHas('bayeur', function ($query) {
            $query->where('role', 'Bayeur');
        })->with('bayeur:id,name,role')->get();
        
        // La vue qui va recevoir les emprunts
        return view('emprunts.index', compact('emprunts'));
    }

    // Fonction pour enregistrer les emprunts
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'emprunteur_id' => 'required|exists:users,id',
            'bayeur_id' => 'required|exists:users,id',
            'montant' => 'required|numeric|min:1000',
            'date_emprunt' => 'required|date',
            'status' => 'required|string',

        ]);

        // Vérifier que l'emprunteur est bien un emprunteur et le bayeur un bayeur
        $emprunteur = User::where('id', $validated['emprunteur_id'])->where('role', 'Emprunteur')->first();
        $bayeur = User::where('id', $validated['bayeur_id'])->where('role', 'Bayeur')->first();


        // Création d'un nouvel emprunt avec les données du formulaire
        $emprunt_data = [
            'emprunteur_id' => $validated['bayeur_id'],
            'bayeur_id' => $validated['emprunteur_id'],
            'montant' => $validated['montant'],
            'date_emprunt' => $validated['date_emprunt'],
            'status' => 'required|in:en_attente,valide,en_cours,rembourse,refuse,annule,litige',
        ];

        $emprunt = Emprunt::create($emprunt_data);

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Emprunt créé avec succès.');
    }

    
}
