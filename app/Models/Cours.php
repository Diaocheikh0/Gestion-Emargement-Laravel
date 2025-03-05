<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = ['nom', 'description', 'heure_debut', 'heure_fin', 'salle_id', 'jour'];

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id');
    }

    public function professeurs()
    {
        return $this->belongsToMany(User::class, 'cours_professeur', 'cours_id', 'prof_id');
    }
}
