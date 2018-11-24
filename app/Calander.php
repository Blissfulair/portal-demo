<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calander extends Model
{
    public static function current_term()
    {
        return self::where('term_start', '<=', date('Y/m/d'))->where('term_end', '>=', date('Y/m/d'))->first();
    }
}
