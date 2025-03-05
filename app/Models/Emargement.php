<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emargement extends Model
{
    protected $fillable = [
        'date',
        'statut',
        'professeur_id',
        'cours_id',
    ];

    /**
     * Définir la relation entre l'émargement et le cours.
     */
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    /**
     * Définir la relation entre l'émargement et le professeur.
     */
    public function professeur()
    {
        return $this->belongsTo(User::class, 'professeur_id');
    }
}
