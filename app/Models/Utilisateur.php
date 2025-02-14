<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    //
    protected $fillable = ['name', 'password', 'email', 'role'];
    
    public function isBayeur(){
        return $this->role=== "Bayeur";
    }

    public function isEmprunteur(){
        return $this->role === "Emprunteur";
    }
}
