<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'idteacher';
    protected $table = 'teachers';

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}
