<?php

namespace App\Models;

use App\Models\Piece;
use App\Models\Ville;
use App\Traits\Uuids;
use App\Models\Agrement;
use App\Models\Personne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditeur extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["personne_id","ville_id", "nom", "date_creation", "num_ifu", "num_rccm", "secteur", "rue", "num_porte", "num_bp", "tel_fixe", "tel_mobile", "email", "date_declaration"];

    public function agrements(){

        return $this->hasMany(Agrement::class);
    }
    public function ville(){

        return $this->belongsTo(Ville::class);
    }
    public function personne(){

        return $this->belongsTo(Personne::class);
    }
    public function pieces(){

        return $this->hasMany(Piece::class);
    }
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
}
