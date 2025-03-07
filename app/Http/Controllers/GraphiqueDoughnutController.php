<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Emargement;
use Illuminate\Http\Request;

class GraphiqueDoughnutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer les données des émargements par cours
        $data = Emargement::selectRaw('cours_id, COUNT(*) as total')
            ->groupBy('cours_id')
            ->with('cours')
            ->get()
            ->map(function ($item) {
                // Calculer le taux de présence
                $totalEmargements = Emargement::where('cours_id', $item->cours_id)->count();
                $totalCursus = Cours::where('id', $item->cours_id)->count(); // Si tu as une table des cours
                $tauxPresence = ($totalEmargements / $totalCursus) * 100; // Calcul du pourcentage

                return [
                    'cours' => $item->cours->nom,
                    'taux' => $tauxPresence
                ];
            });

        // Passer les données à la vue
        return view('graphiques.graphiqueDoughnut', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
