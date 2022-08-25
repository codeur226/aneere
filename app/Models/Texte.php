<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Texte extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["type_id", "reference","objet", "date","fichier"];

    public function types(){

        return $this->belongsTo(Type::class);
    }
}
