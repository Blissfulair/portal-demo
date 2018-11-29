<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public static function current_term()
    {
        return self::where('term_start', '<=', date('Y/m/d'))->where('term_end', '>=', date('Y/m/d'))->first();
    }
    public static function term($term_id)
    {
        $term = array(
            1=>'First Term',
            2=>'Second Term', 
            3=>'Third Term'
        );
        return $term[self::find($term_id)->term];
    }
}
