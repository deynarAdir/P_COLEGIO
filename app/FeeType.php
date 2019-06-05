<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
	protected $table = 'fee_types';

	protected $fillable = ['description','price','discount'];

    protected $primaryKey = 'idfee_types';
}
