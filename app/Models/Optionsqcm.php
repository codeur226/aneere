<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optionsqcm extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];

    public function Question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function reponsesqcm()
    {
        return $this->hasMany(Reponseqcm::class);
    }
}
