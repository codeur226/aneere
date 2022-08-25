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

    public function optionqcm()
    {
        return $this->belongsTo(Optionqcm::class);
    }

    public function audit()
    {
        return $this->belongsTo(Audit::class);
    }
}
