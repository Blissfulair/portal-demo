<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function items()
    {
        return $this->hasMany('App\ResultItem');
    }
}
