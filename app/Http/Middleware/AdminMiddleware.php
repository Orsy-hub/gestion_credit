<?php
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect('/login')->with('error', "Vous devez vous connecter.");
        }

        $user = Auth::user();

        // Vérifie l'email et le mot de passe
        if ($user->email === 'mohammed@gmail.com' && Hash::check('mohammed', $user->password)) {
            return $next($request);
        }

        return redirect('/')->with('error', "Accès refusé !");
    }
}
