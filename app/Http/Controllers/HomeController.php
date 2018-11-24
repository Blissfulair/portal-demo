<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Setting;
use App\Role;
use App\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Role::isStudent()){
            $profile = Student::where('user_id',Auth::user()->id)->first();
            if(count($profile) == null) $new = true;
            else $new = false;
            return view('home', ['profile'=>$profile, 'new'=>$new]);
        }elseif(Role::isTeacher()){
            $profile = Teacher::where('user_id',Auth::user()->id)->first();
            return view('frontend.teacher', ['profile'=>$profile]);
        }
        else{
            $profile = Setting::find(1);
            return view('backend.admin', ['profile'=>$profile]);
        }
    }
}
