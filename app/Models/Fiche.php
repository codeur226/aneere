<?php

namespace App\Models;

use App\Models\Qcm;
use App\Models\Qrt;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fiche extends Model
{
    use HasFactory;
    use Uuids;
   // protected $fillable = ["domaine_id","libelle"];
   public $guarded = [];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function qrts()
    {
        return $this->hasMany(Qrt::class);
    }

    public function qcms()
    {
        return $this->hasMany(Qcm::class);
    }
    public function appelectrique()
    {
        return $this->hasMany(Appelectrique::class);
    }
    
}
