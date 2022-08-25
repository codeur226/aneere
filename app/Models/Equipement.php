<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipement extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["designation","domaine_id"];


    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
