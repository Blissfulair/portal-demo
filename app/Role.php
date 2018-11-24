<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    public const   STUDENT = 0,
                      TEACHER = 1,
                      ADMIN = 2;
                      
    public static function isAdmin()
    {
        if(Auth::user()->role == self::ADMIN){
            return true;
        }else{
            return false;
        }
    }
    public static function isStudent()
    {
        if(Auth::user()->role == self::STUDENT){
            return true;
        }else{
            return false;
        }
    }
    public static function isTeacher()
    {
        if(Auth::user()->role == self::TEACHER){
            return true;
        }else{
            return false;
        }
    }
}
