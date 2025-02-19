<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    //
    use HasFactory;
    protected $fillable = ['emprunteur_id','emprunt_id', 'montant', 'date_emprunt' ];

    public function emprunteur () {
        return $this->belongsTo(Uesr::class, 'emprunteur_id')->where('role', 'Emprunteur');
    }

    public function emprunt () {
        return $this->belongsTO(Emprunt::class, 'emprunt_id');
    }
}
