<?php

namespace App\Http\Controllers;

use App\Models\Emargement;
use Illuminate\Http\Request;

class GraphiqueLigneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Données des émargements par professeur
        $data = Emargement::selectRaw('professeur_id, COUNT(*) as total')
            ->groupBy('professeur_id')
            ->with('professeur')
            ->get()
            ->map(function ($item) {
                return [
                    'professeur' => $item->professeur->name,
                    'total' => $item->total
                ];
            });

        // Par jour
        $dataJour = Emargement::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupByRaw('DATE(created_at)')
            ->orderBy('date', 'ASC')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'total' => $item->total
                ];
            });

        // Par semaine
        $dataSemaine = Emargement::selectRaw("
            EXTRACT(YEAR FROM created_at) || '-' || EXTRACT(WEEK FROM created_at) as date,
            COUNT(*) as total
        ")
            ->groupByRaw("EXTRACT(YEAR FROM created_at), EXTRACT(WEEK FROM created_at)")
            ->orderBy("date", "ASC")
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'total' => $item->total
                ];
            });

        // Par mois
        $dataMois = Emargement::selectRaw("
            TO_CHAR(created_at, 'YYYY-MM') as date,
            COUNT(*) as total
        ")
            ->groupByRaw("TO_CHAR(created_at, 'YYYY-MM')")
            ->orderBy("date", "ASC")
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'total' => $item->total
                ];
            });

        return view('graphiques.graphiqueLigne', compact('data', 'dataJour', 'dataSemaine', 'dataMois'));
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
