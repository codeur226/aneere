<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Uuids;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        /**
     * The roles that belong to the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function isActive()
    {
        return !$this->disable;
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function isTextManager()
    {
        // return dd($this->role->nom);
        return (($this->role->nom == 'Administrateur') OR ($this->role->nom == 'Directeur') OR($this->role->nom == 'Secretaire') OR ($this->role->nom == 'Chef de service')OR ($this->role->nom == 'Gestionnaire agrement'));
    }
    public function isEtablissement()
    {
        // return dd($this->role->nom);
        return ($this->role->nom == 'Etablissement');
    }
    public function isConsommateurManager()
    {
        // return dd($this->role->nom);
        return (($this->role->nom == 'Administrateur') OR ($this->role->nom == 'Directeur') OR ($this->role->nom == 'Chef de service'));
    }
    public function isAuditManager()
    {
        // return dd($this->role->nom);
        return (($this->role->nom == 'Administrateur') OR ($this->role->nom == 'Directeur') OR ($this->role->nom == 'Chef de service') OR ($this->role->nom == 'Agent'));
    }
    public function isAuditeurManager()
    {
        // return dd($this->role->nom);
        return (($this->role->nom == 'Administrateur') OR ($this->role->nom == 'Gestionnaire agrement') );
    }
    public function consommateurs()
    {
        return $this->hasMany(Consommateur::class);
    }

    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }


}
