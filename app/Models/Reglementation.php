<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglementation extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["type_id", "reference", "date","fichier"];

    public function type(){

        return $this->belongsTo(Type::class);
    }
}
