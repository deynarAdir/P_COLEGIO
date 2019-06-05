<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model

{

    public function user(){

        return $this->belongsTo(User::class,'id_user');

    }

    public function student(){

        return $this->hasMany(Student::class,'idstudent','idmanager');

    }
}
