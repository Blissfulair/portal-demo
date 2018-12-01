<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function items()
    {
        return $this->hasMany('App\AttendanceItem');
    }
    public function class()
    {
        return $this->belongsTo('App\Classes');
    }
}
