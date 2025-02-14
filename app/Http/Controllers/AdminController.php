<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboardAdmin()
    {
        $user = Auth::user(); // Récupère l'admin connecté
        return view('admin.dashboard', compact('user'));
    }
}
