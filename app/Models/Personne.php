<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Auditeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personne extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["denomination"];

    public function auditeurs(){

        return $this->hasMany(Auditeur::class);
    }
}
