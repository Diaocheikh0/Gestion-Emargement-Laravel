<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursProfesseur extends Model
{
    protected $table = 'cours_professeur';
    public $timestamps = false;

    protected $fillable = ['cours_id', 'prof_id'];

    // Relation avec les cours
    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cours_professeur', 'prof_id', 'cours_id');
    }

    // Relation avec les professeurs (users)
    public function professeur()
    {
        return $this->belongsTo(User::class, 'prof_id');
    }
}
