<?php

namespace App\Exports;

use App\Models\Emargement;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmargementsExport implements FromCollection, WithHeadings
{
    protected $professeurId;
    protected $startDate;
    protected $endDate;

    public function __construct($professeurId, $startDate = null, $endDate = null)
    {
        $this->professeurId = $professeurId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = Emargement::with(['professeur', 'cours'])
            ->where('professeur_id', $this->professeurId);

        // Filtrer par date de début si spécifié
        if ($this->startDate) {
            $startDate = Carbon::createFromFormat('Y-m-d', $this->startDate)->startOfDay();
            $query->where('created_at', '>=', $startDate);
        }

        // Filtrer par date de fin si spécifié
        if ($this->endDate) {
            $endDate = Carbon::createFromFormat('Y-m-d', $this->endDate)->endOfDay();
            $query->where('created_at', '<=', $endDate);
        }

        $emargements = $query->get();

        // Formater les résultats pour l'export
        return $emargements->map(function ($emargement) {
            return [
                'Date' => $emargement->created_at->format('d/m/Y'),
                'Statut' => $emargement->statut,
                'Professeur' => $emargement->professeur->name,
                'Cours' => $emargement->cours->nom,
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Date', 'Statut', 'Professeur', 'Cours'
        ];
    }
}
