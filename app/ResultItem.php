<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultItem extends Model
{
    public function result()
    {
        return $this->belongsTo('App\Result');
    }
    public function subjects()
    {
        return $this->hasMany('App\Subject', 'id');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
