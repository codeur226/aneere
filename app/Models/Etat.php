<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etat extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["etat"];

    public function agrements(){

        return $this->hasMany(Agrement::class);
    }
}
