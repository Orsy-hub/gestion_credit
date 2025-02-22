<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'solde',
        'image', 
        'status',
        'piece_justificative',
    ];

     /**
     * Relation avec les emprunts (uniquement pour les emprunteurs)
     */
    public function emprunts()
    {
        return $this->hasMany(Emprunt::class, 'emprunteur_id');
    }
     /**
     * Relation avec les offres de prêt (uniquement pour les bayeurs)
     */
    public function offres()
    {
        return $this->hasMany(OffrePret::class, 'bayeur_id');
    }

    /**
     * Relation avec les litiges en tant qu'emprunteur
     */
    public function litigesEnTantQuEmprunteur()
    {
        return $this->hasMany(Litige::class, 'emprunteur_id');
    }

    /**
     * Relation avec les litiges en tant que bayeur
     */
    public function litigesEnTantQueBayeur()
    {
        return $this->hasMany(Litige::class, 'bayeur_id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
