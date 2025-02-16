<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    //
    public function emprunteur(){
        return view('dashEmprunter');
    }

    public function bayeur (){
        return view('dashBayeur');
    }
}
