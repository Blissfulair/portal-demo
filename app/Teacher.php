<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function items()
    {
        return $this->hasMany('App\TeacherItem');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function results()
    {
        return $this->hasMany('App\ResultItem');
    }
}
