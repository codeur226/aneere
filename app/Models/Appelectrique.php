<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appelectrique extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];
    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }

    public function audit()
    {
        return $this->belongsTo(Audit::class);
    }
}
