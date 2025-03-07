<?php

namespace App\Http\Controllers;

use App\Models\Emargement;
use Illuminate\Http\Request;

class GraphiqueBarreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        return view('graphiques.graphiqueBarres', compact('data'));
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
