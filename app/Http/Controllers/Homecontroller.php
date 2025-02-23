<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OffrePret;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *  Cette fonction permet de diriger l'utilisateur 
     *  vers la page d'accueil.
     */
    public function index()
    {
        // Recuperation de toutes les offres d'emprunt.
        $offres = OffrePret::with('bayeur')->get();
        return view('home.index', [
            'current_user' => Auth::user(),
            'offres' => $offres
        ]);
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
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
