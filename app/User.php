<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
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

    public function rol(){
        return $this->hasOne(Rol::class,'idrol','iduser');
    }

    public function manager(){
        return $this->hasOne(Manager::class,'idmanager','iduser');
    }

    public function student(){
        return $this->hasMany(Student::class,'idstudent','iduser');
    }
}
