<?php

namespace App\Http\Controllers;

use App\Exports\EmargementsExport;
use App\Models\Emargement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExportEmargementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function export(Request $request)
    {
        $professeur_id = $request->input('professeur_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $export_type = $request->input('export_type');

        if ($export_type === 'excel') {
            return Excel::download(new EmargementsExport($professeur_id, $start_date, $end_date), 'emargements.xlsx');
        } elseif ($export_type === 'pdf') {

        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();
        $emargements = Emargement::where('professeur_id', $professeur_id)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        ("Emargements count for PDF export: " . $emargements->count());

        $pdf = PDF::loadView('emargements.export_formatPdf', compact('emargements'));
        return $pdf->download('emargements.pdf');
    }
        return back()->with('error', '❌Format d\'exportation invalide.');
    }
}
