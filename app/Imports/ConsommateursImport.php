<?php

namespace App\Imports;

use App\Models\Temporaire;
use App\Models\Importation;
use Maatwebsite\Excel\Concerns\ToModel;

class ConsommateursImport implements ToModel
{
    private $importation = null;

    public function __construct()
    {
        $this->importation= Importation::create([
            "date_importation" => date('Y-m-d H:i:s')
        ]);
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $chaine=explode(" ",$row[0]);
        $type="";
        if (strpos(strtoupper($row[1]), "PARTICULIER") !== false) {
            $type="PARTICULIER";
        }else{
            if (strpos(strtoupper($row[1]), "ADMINISTRATION") !== false) {
                $type="ADMINISTRATION";
            }
        }
        $chaine=explode(" ",trim(str_replace("DISTRIBUTION","",$row[0])));
        $ville="";
        foreach ($chaine as $mot) {
            trim($mot);
            $ville=$ville." ".$mot;
        }
        trim($ville);
        return new Temporaire([
            'ville'    => $ville,
            // 'ville'    =>  preg_replace("/\s+/", " ", str_replace("DISTRIBUTION","",$row[0])),
            'type'    => $type,
           'police'     => $row[2],
           'nom'     => $row[3],
           'telephone'    => $row[4],
           'email'    => $row[5],
           'importation_id'    => $this->importation->id,

        //    'ville'    => $row[2],
        //    'type'    => $row[3],
        //   'nom'     => $row[6],
        //   'telephone'    => $row[12],
        //   'email'    => $row[13],
        //   'importation_id'    => $this->importation->id,
        ]);



    }

    // public function batchSize(): int
    // {
    //     return 1000;
    // }

}
