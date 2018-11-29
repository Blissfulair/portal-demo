<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function results()
    {
        return $this->hasMany('App\Result');
    }
    public static function current_class($student_id)
    {
        return self::find($student_id)->class;
    } 
}
