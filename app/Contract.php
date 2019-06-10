<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $primaryKey = 'idcontract';

    public function user(){
    	return $this->belongTo('App\User', 'id_user');
    }

    public function typeContract(){
        return $this->belongTo('App\TypeContract', 'id_type_contract');
    }
}
