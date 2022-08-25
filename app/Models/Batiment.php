<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batiment extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["date_declaration", "consommateur_id", "num_compteur", "niveau"];


    public function consommateur()
    {
        return $this->belongsTo(Consommateur::class);
    }
}
