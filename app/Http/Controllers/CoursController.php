<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cours::with('salle')->get();
        return view('listCours', compact('cours'));
    }

    /**
     Pour recupérer le nom de la salle et l'afficher sur la liste des cours
     */
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeurs = User::where('role', 'professeur')->get();
        $salles = Salle::all();

        return view('addCours', compact('professeurs', 'salles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'salle_id' => 'required|exists:salles,id',
            'prof_id' => 'required|exists:users,id',
            'jour' => 'required',
        ]);

        // Vérification des conflits d’horaires
        $conflit = Cours::where('prof_id', $request->prof_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                    ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin]);
            })
            ->exists();

        if ($conflit) {
            return redirect()->back()->withErrors(['error' => 'Conflit d’horaire pour ce professeur.']);
        }

        $cour = new Cours();
        $cour->nom = $request->input('nom');
        $cour->description = $request->input('description');
        $cour->heure_debut = $request->input('heure_debut');
        $cour->heure_fin = $request->input('heure_fin');
        $cour->salle_id = $request->input('salle_id');
        $cour->prof_id = $request->input('prof_id');
        $cour->jour = $request->input('jour');
        $cour->save();

        return to_route('listCours')->with('status', 'Cours créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professeurs = User::where('role', 'professeur')->get();
        $cours = Cours::findOrFail($id);
        $salles = Salle::all();

        return view('editCours', compact('cours', 'salles', 'professeurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'salle_id' => 'required|exists:salles,id',
            'prof_id' => 'required|exists:users,id',
            'jour' => 'required',
        ]);

        $cour = Cours::findOrFail($id);

        // Vérification des conflits d’horaires pour ce professeur
        $conflit = Cours::where('prof_id', $request->prof_id)
            ->where('id', '!=', $id) // Exclure le cours en cours de modification
            ->where(function ($query) use ($request) {
                $query->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                    ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin]);
            })
            ->exists();

        if ($conflit) {
            return redirect()->back()->withErrors(['error' => 'Conflit d’horaire pour ce professeur.']);
        }

        $cour->nom = $request->input('nom');
        $cour->description = $request->input('description');
        $cour->heure_debut = $request->input('heure_debut');
        $cour->heure_fin = $request->input('heure_fin');
        $cour->salle_id = $request->input('salle_id');
        $cour->prof_id = $request->input('prof_id');
        $cour->jour = $request->input('jour');
        $cour->save();

        return to_route('listCours')->with('status', 'Cours mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cours::destroy($id);

        return to_route('listCours')->with('status', 'Cour deleted successfully');
    }

}
