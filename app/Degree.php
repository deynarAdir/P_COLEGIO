<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = ["name","quantity"];

    public function student()
    {
        return $this->hasMany(Student::class, 'id_degree');
    }
}
