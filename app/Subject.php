<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function item()
    {
        return $this->belongsTo('App\ResultItem');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
    public function teacher_items()
    {
        return $this->hasMany('App\TeacherItem');
    }

}
