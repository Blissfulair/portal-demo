<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherItem extends Model
{
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
