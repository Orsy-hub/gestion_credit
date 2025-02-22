<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentifie l'utilisateur.
        $request->authenticate();

        // Recuperation de l'utilsateur actuellement authentifie.
        $user = Auth::user();

        // Verifie si l'inscription de cette utilisateur a ete 'valide' (verifier = 1).
        if ($user->verifier != 1) {
            // Deconnexion de l'utilisateur.
            Auth::logout();

            // Redirige avec un message d'erreur.
            return redirect()->route('login')->withErrors([
                "verifier" => "Veillez patienter la validation de votre inscription par l'admin avant de vous connecter!"
            ]);
        }

        // Lorsque son inscription a ete valider generation de la session.
        $request->session()->regenerate();
        
        // Redirection vers l'accueil.
        return redirect()->route('home', [
            'user' => $user
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
