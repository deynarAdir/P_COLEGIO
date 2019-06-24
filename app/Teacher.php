<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'idteacher';

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
    
}
