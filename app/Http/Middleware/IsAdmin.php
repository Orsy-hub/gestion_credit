<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        // Vérifier si l'admin est bien authentifié
        if (
            $request->getUser() === 'admin@example.com' &&
            $request->getPassword() === 'MotDePasseAdmin'
        ) {
            return $next($request);
        }

        // Si les identifiants sont faux, renvoyer une réponse non autorisée
        return response()->json(['message' => 'Accès refusé'], 401);
    }
}
