<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function student(){
        return $this->belongsTo(Student::class,'id_document');
    }
}
