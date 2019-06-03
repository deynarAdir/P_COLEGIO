<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
	protected $table = 'monthly_payments';

	protected $fillable = ['start_date','end_date','description','price'];

    protected $primaryKey = 'idmonthly_payment';
}
