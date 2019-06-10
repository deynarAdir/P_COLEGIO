<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function document(){
        return $this->hasMany(Document::class,'id_student','idstudent');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function manager(){
        return $this->belongsTo(Manager::class,'id_manager','idmanager');
    }

    public function degree(){
        return $this->belongsTo(degree::class,'id_degree','iddegree');
    }

    public function parallel(){
        return $this->belongsTo(Parallel::class,'id_parallel','idparallel');
    }

}
