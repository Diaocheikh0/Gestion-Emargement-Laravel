<?php

namespace App\Http\Controllers;

use App\Exports\EmargementsExport;
use App\Models\Emargement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportEmargementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ExportEmargements');
    }

    /*public function export(Request $request)
    {
        $type = $request->input('export_type');

        $professeurId = $request->input('professeur_id');

        if ($type == 'excel') {
            return Excel::download(new EmargementsExport($professeurId), 'Emargements.xlsx');
        }

        return redirect()->back()->with('error', 'Veuillez choisir un format d\'exportation.');
    }*/

    public function export(Request $request)
    {
        $type = $request->input('export_type');
        $professeurId = $request->input('professeur_id');

        if ($type == 'excel') {
            return Excel::download(new EmargementsExport($professeurId), 'Emargements.xlsx');
        }

        if ($type == 'pdf') {
            $emargements = Emargement::with(['professeur', 'cours'])
                ->where('professeur_id', $professeurId)
                ->get();

            return Pdf::loadView('export_formatPdf', ['emargements' => $emargements])
                ->download('Emargements.pdf');
        }

        return redirect()->back()->with('error', 'Veuillez choisir un format d\'exportation.');
    }

    public function showExportForm()
    {
        return view('exportEmargements');
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
