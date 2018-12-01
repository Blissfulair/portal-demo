<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    public const   STUDENT = 0,
                      TEACHER = 1,
                      HOD = 2,
                      PRINCIPAL = 3,
                      ADMIN = 4;
                      
    public static function team_member($member_id)
    {
        $team = array('Student', 'Teacher', 'Head Of Department', 'Head Of School');
        return $team[$member_id];
    }
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
    public static function isHOD()
    {
        if(Auth::user()->role == self::HOD){
            return true;
        }else{
            return false;
        }
    }
    public static function isPrincipal()
    {
        if(Auth::user()->role == self::PRINCIPAL){
            return true;
        }else{
            return false;
        }
    }
}
