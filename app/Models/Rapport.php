<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rapport extends Model
{
    use HasFactory;
    use Uuids;
    public $guarded = [];

    public function auditeur()
    {
        return $this->belongsTo(Auditeur::class);
    }
    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
