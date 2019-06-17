<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminControl extends Model
{
    protected $table = 'admin_controls';
    protected $primaryKey = 'idadmin_control';

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
