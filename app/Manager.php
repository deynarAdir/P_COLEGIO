<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model

{

    public function user(){

        return $this->belongsTo(User::class,'id_user','iduser');

    }

    public function student(){

        return $this->hasMany(Student::class,'id_manager','idmanager');

    }
}
