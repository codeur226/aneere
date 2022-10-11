<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Question extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];

    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }

    public function reponse()
    {
        return $this->hasMany(Reponse::class);
    }

    public function optionqcms()
    {
        return $this->hasMany(Optionqcm::class);
    }

   
}
