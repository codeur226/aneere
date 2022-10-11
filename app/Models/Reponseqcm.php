<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponseqcm extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];

    public function optionsqcm()
    {
        //une reponse appartient a une optionqcm
        return $this->belongsTo(Optionqcm::class);
    }

    public function audit()
    {
        //une reponse appartient a un audit
        return $this->belongsTo(Audit::class);
    }
}
