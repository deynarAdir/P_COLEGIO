<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
<<<<<<< HEAD
	protected $table = 'fee_types';

	protected $fillable = ['description','price','discount'];

    protected $primaryKey = 'idfee_types';
=======
    protected $table = 'fee_types';

    protected $primaryKey = 'idfee_type';
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
}
