<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function document(){
        return $this->hasOne(Document::class,'idstudent');
    }

    public function user(){
        return $this->hasOne(User::class,'iduser');
    }

    public function manager(){
        return $this->belongsTo(Manager::class,'idmanager');
    }
}
