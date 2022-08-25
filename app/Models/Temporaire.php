<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Importation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Temporaire extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["nom","police","ville","type","telephone","email","importation_id"];


    public function importation()
    {
        return $this->belongsTo(Importation::class);
    }
}
