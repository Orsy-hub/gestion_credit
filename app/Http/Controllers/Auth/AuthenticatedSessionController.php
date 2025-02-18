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
        $request->authenticate();

        $request->session()->regenerate();
// il faut exécuter la méthode authentificated
        // return $this->authentificated($request, Auth::user());

        // Diriger vers home
        return redirect()->route('home');

    }

    // protected function authentificated (Request $request, $user){
    //     if ($user->role==='Bayeur') {
    //         return redirect()->route('dashBayeur');
    //     }
    //     elseif($user->role==='Emprunteur'){
    //         return redirect()->route('dashEmprunteur');
    //     }
    //     return redirect()->route('dashboard');
    // }

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
