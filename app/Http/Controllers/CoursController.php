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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salles = Salle::all();
        return view('addCours', compact('salles'));
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
            'jour' => 'required|in:Lundi,Mardi,Mercredi,Jeudi,Vendredi,Samedi,Dimanche',
        ]);

        // Vérification des conflits d’horaires pour la salle
        $conflit = Cours::where('salle_id', $request->salle_id)
            ->where('jour', $request->jour)
            ->where(function ($query) use ($request) {
                $query->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                    ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin]);
            })
            ->exists();

        if ($conflit) {
            return redirect()->back()->withErrors(['error' => 'Conflit d’horaire détecté pour cette salle et ce jour.']);
        }

        Cours::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'salle_id' => $request->salle_id,
            'jour' => $request->jour,
        ]);

        return to_route('listCours')->with('status', 'Cours ajouté avec succès.');
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
        $cours = Cours::findOrFail($id);
        $salles = Salle::all();
        return view('editCours', compact('cours', 'salles'));
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
            'jour' => 'required|in:Lundi,Mardi,Mercredi,Jeudi,Vendredi,Samedi,Dimanche',
        ]);

        $cours = Cours::findOrFail($id);

        $conflitSalle = Cours::where('salle_id', $request->salle_id)
            ->where('jour', $request->jour)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                    ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin]);
            })
            ->exists();

        if ($conflitSalle) {
            return redirect()->back()->withErrors(['error' => 'Conflit d’horaire : cette salle est déjà occupée à cette heure et ce jour.']);
        }

        $cours->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'salle_id' => $request->salle_id,
            'jour' => $request->jour,
        ]);

        return to_route('listCours')->with('status', 'Cours mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cour = Cours::findOrFail($id);

        // Vérifier si le cours est lié à des émargements
        if ($cour->emargements()->exists()) {
            return redirect()->back()->withErrors(['error' => 'Impossible de supprimer ce cours, des présences y sont associées.']);
        }

        $cour->delete();
        return to_route('listCours')->with('status', 'Cours supprimé avec succès.');
    }

}
