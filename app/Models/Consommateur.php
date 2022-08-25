<?php

namespace App\Models;

use App\Models\Audit;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consommateur extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["user_id","police","nom","num_identification","ville_id","domaine_id", "statut",  "tel_mobile", "tel_fixe", "bp","num_secteur","rue","num_porte", "num_rccm", "num_ifu","autre", "date_creation"];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
    public function batiments()
    {
        return $this->hasMany(Batiment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function audits()
    {
        return $this->hasMany(Audit::class);
    }
}
