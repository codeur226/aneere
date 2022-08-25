<?php

namespace App\Models;

use App\Models\Qcm;
use App\Models\Qrt;
use App\Traits\Uuids;
use App\Models\Consommateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Audit extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function consommateur(){

        return $this->belongsTo(Consommateur::class);
    }
    public function qcms()
    {
        return $this->hasMany(Qcm::class);
    }
    public function qrts()
    {
        return $this->hasMany(Qrt::class);
    }
    public function appelectrique()
    {
        return $this->hasMany(Appelectrique::class);
    }

}
