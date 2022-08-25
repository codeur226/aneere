<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Agrement;
use App\Models\Equipement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domaine extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["nom"];

    public function consommateurs()
    {

        return $this->hasMany(Consommateur::class);
    }
    public function agrements()
    {

        return $this->hasMany(Agrement::class);
    }
    public function equipements()
    {

        return $this->hasMany(Equipement::class);
    }
}
