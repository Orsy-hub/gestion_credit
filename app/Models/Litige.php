<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Litige extends Model
{
    //
    use HasFactory;

    protected $fillable = ['emprunteur_id', 'bayeur_id', 'description', 'status', 'date_litige'];

    public function emprunteur()
    {
        return $this->belongsTo(User::class, 'emprunteur_id')->where('role', 'Emprunteur');
    }

    public function bayeur()
    {
        return $this->belongsTo(User::class, 'bayeur_id')->where('role', 'Bayeur');
    }
}
