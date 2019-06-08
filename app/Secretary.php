<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $table = 'secretaries';
    protected $primaryKey = 'idsecretary';

    public function user(){
		return $this->belongsTo('App\User','id_user');
    }
}
