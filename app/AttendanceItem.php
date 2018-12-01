<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceItem extends Model
{
    public function attendance()
    {
        return $this->belongsTo('App\Attendance');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
