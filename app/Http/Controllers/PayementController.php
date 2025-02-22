<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payement; 

class PayementController extends Controller
{
    // Méthode de rcupération des données
    public function index () {
        // Filtre les payements en fonction de la relation avec l'emprunteur
        $payements = Payement::whereHas('emprunteur', function ($query) {
            // Applique le filtre par rapport sur la table users par rapport au rôle
            $query->where('role', 'Emprunteur');
        })->with('emprunteur:id,name,role')->get();
        return view('payement.index', compact('payement'));
    }

    public function store (Request $request) {

        $validated = $request->validate([
            'emprunteur_id' => 'required|exist:user,id',
            'emprunt_id' => 'required|exist:emprunts,id', 
            'montant' => 'required|numeric|min:1000', 
            'date_emprunt' => 'required|date',
        ]);

        // Création d'un nouveau paiement
        $payement = Payement::create($validated);

        return redirect()->back()->with('succes', 'Payement créer avec succès !');
    }

}

