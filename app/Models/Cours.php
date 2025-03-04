<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = ['nom', 'description', 'heure_debut', 'heure_fin', 'salle_id'];

    public function professeur()
    {
        return $this->belongsTo(User::class, 'prof_id');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id');
    }
}
