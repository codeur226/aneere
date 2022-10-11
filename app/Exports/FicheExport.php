<?php

namespace App\Exports;

use App\Models\Appelectrique;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FicheExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    protected $audit_id;

    public function __construct($audit_id)
    {
        $this->audit_id = $audit_id;
    }


    public function query()
    {
        return Appelectrique::where('audit_id',$this->audit_id);
    }

    public function map($appelectrique): array
    {
        return [
            $appelectrique->emplacement,
            $appelectrique->designation,
            $appelectrique->quantite,
            $appelectrique->puissance_electrique,
            $appelectrique->duree,
            $appelectrique->etat_fonctionnement,
            $appelectrique->Observations,
        ];
    }

    public function headings(): array
    {
        return [
            "Emplacement",
            "Designation",
            "Quantite",
            "Puissance",
            "Duree",
            "Etat",
            "Observation",
        ];
    }
}
