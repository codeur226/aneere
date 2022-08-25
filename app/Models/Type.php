<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["libelle"];

    public function reglementations(){

        return $this->hasMany(Reglementation::class);
    }
}
