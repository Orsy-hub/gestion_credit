<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    //
    use HasFactory;
    protected $fillable = ['emprunteur_id', 'offre_pret_id', 'montant', 'date_emprunt'];

    public function emprunteur () {
        return $this->belongsTo(User::class,'emprunteur_id')->where('role', 'Emprunteur');
    }

    public function offrePret () {
        return $this->belongsTo(OffrePret::class, 'offre_pret_id');
    }

    public function payement () {
        return $this->hasMany(Payement::class, 'emprunt_id');
    }
}
