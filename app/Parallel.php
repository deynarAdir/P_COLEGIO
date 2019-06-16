<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parallel extends Model
{
    protected $fillable = ["name","quantity"];

    public function student()
    {
        return $this->hasMany(Student::class, 'id_parallel', 'idparallel');
    }
}
