<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Emargement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmargementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emargements = Emargement::where('professeur_id', auth()->id())->get();

        return view('historiqueEmargements', compact('emargements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jourActuel = Carbon::now()->locale('fr_FR')->isoFormat('dddd');

        $coursDuJour = Cours::whereHas('professeurs', function ($query) {
            $query->where('users.id', auth()->id());
        })->where('cours.jour', ucfirst($jourActuel))
            ->get();

        return view('emargements', compact('coursDuJour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'statut' => 'required|in:Présent,Absent',
        ]);

        // Création de l'émargement
        Emargement::create([
            'date' => today(),
            'statut' => $request->statut,
            'professeur_id' => auth()->id(),
            'cours_id' => $request->cours_id
        ]);

        return back()->with('success', 'Émargement enregistré.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
