<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeContract extends Model
{
    protected $table = 'type_contracts';
    protected $primaryKey = 'idtype_contract';

    public function contracts(){
    	return $this->hasMany('App\Contract', 'id_type_contract');
    }
}
