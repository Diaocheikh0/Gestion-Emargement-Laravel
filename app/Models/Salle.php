<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = ['libelle'];

    public function cours()
    {
        return $this->hasMany(Cours::class, 'salle_id');
    }
}
