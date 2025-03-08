<?php

namespace App\Http\Controllers;

use App\Mail\AttributionCoursMail;
use App\Models\Cours;
use App\Models\CoursProfesseur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CoursProfesseurController extends Controller
{
    public function index()
    {
        $cours = Cours::all();
        $professeurs = User::where('role', 'professeur')->get();

        return view('cours.attributionCours', compact('cours', 'professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'prof_id' => 'required|exists:users,id',
        ]);

        // Récupérer le cours et le professeur
        $cours = Cours::findOrFail($request->cours_id);
        $professeur = User::findOrFail($request->prof_id);

        // Créer l'enregistrement dans la table cours_professeur
        $cours->professeurs()->attach($request->prof_id);

        // Récupérer l'objet CoursProfesseur après l'attachement
        $coursProfesseur = CoursProfesseur::where('cours_id', $request->cours_id)
            ->where('prof_id', $request->prof_id)
            ->first();

        // Envoi de l'email avec l'objet CoursProfesseur
        Mail::to($professeur->email)->send(new AttributionCoursMail($cours, $coursProfesseur));

        return to_route('cours-professeurs.index')->with('status', 'Cours attribué avec succès.');
    }

    public function destroy($cours_id, $prof_id)
    {
        CoursProfesseur::where('cours_id', $cours_id)
            ->where('prof_id', $prof_id)
            ->delete();

        return redirect()->route('cours-professeurs.index')->with('status', 'Attribution supprimée avec succès.');
    }
}
