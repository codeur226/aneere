<?php

namespace App\Models;
 
use App\Models\Rqcm;
use App\Models\Audit;
use App\Models\Fiche;
use App\Traits\Uuids; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qcm extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["fiche_id","audit_id","num_ordre"];

    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }
    public function audit()
    {
        return $this->belongsTo(Audit::class);
    } 
    public function rqcms()
    {
        return $this->hasMany(Rqcm::class);
    } 
}
