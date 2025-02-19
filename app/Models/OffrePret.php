<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffrePret extends Model
{
    //
    use HasFactory;
    protected $fillable = ["bayeur_id", "montant", "taux_interet", "date_offre"];

    public function bayeur () {
        return $this->belongsTo(Users::class,'bayeur_id')->where('role', 'Bayeur');
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class, 'offre_pret_id');
    }
}
