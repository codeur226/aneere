<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Temporaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Importation extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["date_importation"];

    public function temporaires()
    {

        return $this->hasMany(Temporaire::class);
    }
}
