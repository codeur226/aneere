<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = ["nom"];

    public function user(){

        return $this->hasMany(user::class);
    }
}
