<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'name','paternal','maternal', 'ci','gender', 'email', 'password', 'total_intento', 'intentos' ,'fecha_bloqueo'
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
    public function rol(){
        return $this->belongsTo(Rol::class,'id_rol','idrol');
    }

    public function manager(){
        return $this->hasMany(Manager::class,'id_user','iduser');
    }

    public function student(){
        return $this->hasMany(Student::class,'id_user','iduser');
    }


}
