<?php

namespace App\Http\Controllers;

use App\Models\OffrePret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffrePretController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ici c'est pour diriger vers la pages
     * d'offre.
     */
    public function index()
    {
        // $offres = OffrePret::with('bayeur:id,nom')->get();
         // Récupérer toutes les offres avec le bailleur (uniquement ceux ayant le rôle 'bailleur')
        $offres = OffrePret::whereHas('bayeur', function ($query) {
            $query->where('role', 'Bayeur');
        })->with('bayeur:id,name,role')->get();

        // Recupetayion de l'utilisateur courament connecter.
        $current_user = Auth::user();
        return view('offres.index', compact('offres','current_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Ici c'est pour creer ou ajouter de nouvelle 
     * offre d'emprunt dans la base de donnee.
     */
    public function store(Request $request)
    {
        // validation des donnees recu du formulaire.
        $validated = $request->validate([
            // Ce champs est obligatoire et limite a 100 caracteres.
            'titre' => 'required|string|max:100',
            'montant' => 'required|numeric|min:100',
            'taux_interet' => 'required|',
            'date_limite' => 'required|date|after:today',
            'conditions' => 'required|string',
        ]);

        // Utilisateur connecter.
        $user_id = Auth::user()->id;

        // Apres validation et lorsqu'elle c'est bien faite creation
        // de l'offre d'emprunt.
        OffrePret::create([
            'bayeur_id' => $user_id, // L'utilisateur connecter est le bayeur.
            'titre' => $validated['titre'],
            'montant' => $validated['montant'],
            'taux_interet' => $validated['taux_interet'],
            'date_offre' => now(),
            'date_limite' => $validated['date_limite'],
            'conditions' => $validated['conditions']
        ]);

        // Une fois l'enregistrement effectue avec succes 
        // renvoit vers la page d'offre avec un message de
        // reussite.
        return redirect()->back()->with('success', "Offre ajoutée avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validations des champs.
        $request->validate([
            'titre' => 'required|string|max:100',
            'montant' => 'required|numeric|min:100',
            'conditions' => 'required|string'
        ]);

        // Selection de l'offre concerne.
        $offre = OffrePret::find($id);

        // Verification que l'offre a ete trouve.
        if (!$offre) {
            return back()->with('erreur', 'Offre non trouvée');
        }

        // Mise a jour de l'offre.
        $offre->update([
            'titre' => $request->titre,
            'montant' => $request->montant,
            'taux_interet' => $request->taux_interet,
            'conditions' => $request->conditions
        ]);

        // Lorsque la mise a jour s'effectu bien.
        return back()->with('success', "L'offre a été mise à jour avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     * Methode pour la suppresion d'une offre.
     */
    public function destroy(string $id)
    {
        // Recherche de l'offre par son id.
        $offre = OffrePret::find($id);

        // Verification si une offre a ete trouve.
        if (!$offre) {
            return redirect()->route('offres.index')->with('error', 'Offre non trouvee !');
        }

        // Dans le cas contraire, suppression de l'offre.
        $offre->delete();

        // Redirection avec un message de succes.
        return redirect()->route('offres.index')->with('success', 'Offre supprimee avec succes !');
    }
}
