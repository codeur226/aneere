<?php

namespace App\Models;

use App\Models\Qcm;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rqcm extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["qcm_id","reponse","etiquette"];

    public function qcm()
    {
        return $this->belongsTo(Qcm::class);
    } 
}
