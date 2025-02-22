<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LitigeController extends Controller
{
    //
    public function index () {

        $litiges = Litige::whereHas('emprunteur', function ($query) {
            $query->where('role', 'Emprunteur');
        })->whereHas('bayeur', function ($query) {
            $query->where('role', 'Bayeur');
        })->get();

        // La vue qui va recevoir la vue
        return view('litige.index');
    }

    public function store (Request $request) {
        $validated = $request->validate([
            'emprunteur_id' => 'required|exits:users,id', 
            'bayeur_id' => 'required|exits:users,id', 
            'description' => 'required|string', 
            'status' => 'required|in:en_attente,en_cours,resolu,rejete',
            'date_litige' => 'required|date'
        ]);

        // Vérifier le rôle des utilisateurs sont corrects
        $emprunteur = User::where('id', $validated['emprunteur_id'])->where('role', 'Emprunteur');
        $bayeur = User::where('id', $validated['bayeur_id'])->where('role', 'Bayeur');

        // Créer le Litige
        $litige_data = [
            'emprunteur_id' => $validated['emprunteur_id'],
            'bayeur_id' => $validated['bayeur_id'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'date_litige' => now(),
        ];
        $litige = Litige::create($litige_data);
        return redirect()->back()->with('succes', 'Litige crée avec succès');
    }
}
