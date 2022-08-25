<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Auditeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["nom"];

    public function consommateurs()
    {

        return $this->hasMany(Consommateur::class);
    }
    public function auditeurs()
    {

        return $this->hasMany(Auditeur::class);
    }
}
