<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est connecté
        // $user = Auth::user();

        // Vérifie si l'utilisateur est bien "admin"
        if ($request->input('token') !== 'mohammed@gmail.com') {
            return redirect('/welcome')->with('error', 'Accès réservé à l\'administrateur.');
        }
        
        // Redirige vers la page de connexion si l'utilisateur n'est pas admin
        return $next($request);
    }
}
