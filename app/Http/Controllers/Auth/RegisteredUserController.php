<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    

    public function store(Request $request): RedirectResponse
    {
        $request->merge(['role' => $request->role ?? 'Emprunteur']);
        // Valider les données
        $valider=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|string|in:Emprunteur,Bayeur',
            'solde' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|in:en_attente,rejeté,suspendu',
            'piece_justificatif'=> 'required|image|mines:jpeg,png,jpg,|max:248',
        ]);

         // Enregistrer l'image du profil s'il y en a une
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('users', 'public') : null;

        // Enregistrer la pièce justificative
        $piecePath = $request->file('piece_justificatif')->store('justificatifs', 'public');


        // Vérifier si c'est un bayeur et ajouter le champ solde puis créer le user

        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,    //ajout du champ role
            'solde' => $request->role === 'Bayeur' ? $request->solde : 0, // Mettre le solde de l'emprunteur à 0 sinon la valeur saisi    
            'image' => $imagePath,
            'status'=> $valider['status']?? 'en_attente',
            'piece_justificatif' => $piecePath,
        ];

        $user = User::create($data_user);   // Création de l'utilisateur
        event(new Registered($user));

        return redirect(route('home'));
    }
<<<<<<< HEAD

    // Methode qui récupère les users en attente ou validés depuis la base de données
    
=======
>>>>>>> feature/responsif
}
