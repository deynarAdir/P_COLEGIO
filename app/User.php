<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Rol;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'iduser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'total_intento', 'intentos' ,'fecha_bloqueo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teachers(){
        return $this->hasMany('App\Teacher','id_user');
    }

    public function secretaries(){
        return $this->hasMany('App\Secretary','id_user');
    }

    public function contracts(){
        return $this->hasMany('App\Contract', 'id_user');
    }

    public function assistances()
    {
         return $this->hasMany('App\AdminControl', 'id_user');
    }

    //buscar un usuario por nombre o ci
    public function scopeSearchUser($query, $name){
        if($name)
            return $query->where('name','LIKE',"%$name%")->orWhere('ci','LIKE',"%$name%");
    }
    //buscar por nombre
    public function scopeSearchName($query, $name){
        if($name)
            return $query->orWhere('name','LIKE',"%$name%");
    }
    // buscar usuario por roles
    public function scopeSearchCI($query, $ci){
        if($ci)
            return $query->orWhere('ci','LIKE',"%$ci%");
    }
}
