<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function audit()
    {
        return $this->belongsTo(Audit::class);
    }
}
