<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SallesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::paginate(7);
        return view('salles.listSalles', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salle = new Salle();

        return view('salles.addSalle', compact('salle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $salle = new Salle();
        $salle->libelle = $request->input('libelle');
        $salle->save();

        return to_route('salle.index')->with('status', 'Salle créer avec succès');
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
        $salle = Salle::find($id);

        return view('salles.addSalle', compact('salle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $salle = Salle::find($id);
        $salle->libelle = $request->input('libelle');
        $salle->save();

        return to_route('salle.index')->with('status', 'Salle modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Salle::destroy($id);

        return to_route('salle.index')->with('status', 'Salle supprimé avec succès');
    }
}
