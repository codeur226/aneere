<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Auditeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Piece extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["auditeur_id","piece"];

    public function auditeur(){

        return $this->belongTo(Auditeur::class);
    }
}
