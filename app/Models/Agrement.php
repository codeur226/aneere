<?php

namespace App\Models;

use App\Models\Etat;
use App\Traits\Uuids;
use App\Models\Domaine; 
use App\Models\Auditeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agrement extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["auditeur_id", "etat_id", "domaine_id", "nom", "num_agrement", "date_delivrance"];

    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function auditeur()
    {
        return $this->belongsTo(Auditeur::class);
    }


}
