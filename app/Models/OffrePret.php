<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffrePret extends Model
{
    //
    use HasFactory;
    protected $fillable = ["bayeur_id", "titre", "montant", "taux_interet", "date_offre", "date_limite", "conditions"];

    public function bayeur () {
        return $this->belongsTo(User::class,'bayeur_id')->where('role', 'Bayeur');
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class, 'offre_pret_id');
    }
}
