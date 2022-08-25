<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];

    public function rapport()
    {
        return $this->belongsTo(Rapport::class);
    }
    
}
