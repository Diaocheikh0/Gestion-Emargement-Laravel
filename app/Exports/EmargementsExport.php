<?php

namespace App\Exports;

use App\Models\Emargement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmargementsExport implements FromCollection, WithHeadings
{

    protected $professeurId;

    // Constructeur pour recevoir l'ID du professeur
    public function __construct($professeurId)
    {
        $this->professeurId = $professeurId;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Emargement::with(['professeur', 'cours'])
            ->where('professeur_id', $this->professeurId)
            ->get()
            ->map(function ($emargement) {
                return [
                    'date' => $emargement->created_at,
                    'statut' => $emargement->statut,
                    'professeur' => $emargement->professeur->name,
                    'cours' => $emargement->cours->nom,
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
