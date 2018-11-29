<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    public static function class_name($class_id)
    {
        return self::find($class_id)->class;
    } 
}
