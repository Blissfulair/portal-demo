<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Setting;
use App\User;
use App\Subject;
use App\Student;
use App\Calander;
use App\Role;
use App\Teacher;
use App\TeacherItem;
use App\Classes;

class BackendController extends Controller
{
    protected const STUDENT = 0, TEACHER = 1, NOT_DELETED = 0, DELETED = 1;
    public function index()
    {
        if(Role::isAdmin()){
            $profile = Setting::find(1);
        return view('backend.admin', ['profile' => $profile]);
        }
        else return back();
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required',
            'about_us' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'gplus' => 'required'
        ]);
        $update = false;
        $setting = Setting::find(1);
        if($setting){
            $update = true;
        }else{
            $setting = new Setting();
        }
        $file = $request->file('logo');
        if($file){
            $name = 'logo_'.date('Y_m_d_His', time()).'_'.$file->getClientOriginalName();
            Storage::disk('local')->put($name, File::get($file));
        }
        $setting->filename = $name;
        $setting->about_us = $request['about_us'];
        $setting->email = $request['email'];
        $setting->phone = $request['phone'];
        $setting->facebook = $request['facebook'];
        $setting->twitter = $request['twitter'];
        $setting->gplus = $request['gplus'];
        if($update){
            $setting->update();
        }else{
        $setting->save();
        }
        return back();
    }
    public function photo($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
    public function register_student()
    {
        return view('backend.register_student');
    }
    public function register_teacher()
    {
        $subjects = Subject::all();
        return view('backend.register_teacher', ['subjects'=>$subjects]);
    }
    public function signup_new(Request $request)
    {
        if($request['type'] == self::STUDENT){
            $validations = array(
                'name' => 'required|max:122',
                'email'   => 'required|email|unique:users',
                'password' => 'required|min:4',
                'class' => 'required'
            );
        }if($request['type'] == self::TEACHER){
            $validations = array(
                'name' => 'required|max:122',
                'email'   => 'required|email|unique:users',
                'password' => 'required|min:4',
                'subject' => 'required'
            );
        }
        $this->validate($request, $validations);
      $student_name = $request['name'];
      $student_email = $request['email'];
      $student_password = bcrypt($request['password']);
      if($request['type'] == self::STUDENT){
        $student = new Student();
        $student->class = $request['class'];
      }else{
        $student = new Teacher();
      }
      $user = new User();
      if($request['type'] == self::TEACHER){
        $user->role = self::TEACHER;
        $teacher_item = new TeacherItem();
        $teacher_item->teacher_id = Teacher::orderBy('id', 'desc')->first()->id;
        $teacher_item->subject_id = $request['subject'];
        $teacher_item->save();
      }
      $user->name = $student_name;
      $user->email = $student_email;
      $user->password = $student_password;
      $user->save();
      $student->name = $request['name'];
      $student->email = $request['email'];
      $student->user_id = User::orderBy('id', 'desc')->first()->id;
      $student->save();
      return redirect()->route('admin');
    }
    public function student()
    {
        $slots = User::where(['role'=>self::STUDENT, 'deleted'=>self::NOT_DELETED])->get();
        return view('backend.student', ['slots' => $slots]);
    }
    public function teacher()
    {
        $slots = User::where(['role'=>self::TEACHER, 'deleted'=>self::NOT_DELETED])->get();
        return view('backend.teacher', ['slots' => $slots]);
    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('backend.user_edit', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        if($request['npassword']){
            $user->password = bcrypt($request['npassword']);
        }
        $user->update();
        return back()->with('success', 'Profile Updated');
    }
    public function delete($user_id){
        $user = User::find($user_id);
        $user->deleted = self::DELETED;
        $user->update();
        return back()->with('success', 'Record Deleted');
    }
    public function subject_form()
    {
        return view('backend.subject_form');
    }
    public function save_subject(Request $request)
    {
        $subject = new Subject();
        $subject->subject = $request['subject'];
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return back();
    }
    public function calander()
    {
        return view('backend.calander');
    }
    public function calander_create(Request $request)
    {
        if(Role::isAdmin()){
            $this->validate($request, [
                'session' => 'required',
                'term' => 'required',
                'term_start' => 'required',
                'term_end' => 'required'
            ]);
            $calander = new Calander();
            $calander->session = $request['session'];
            $calander->term = $request['term'];
            $calander->term_start = $request['term_start'];
            $calander->term_end = $request['term_end'];
            $calander->save();
            return redirect()->route('all_calander');
        }else return back();
    }
    public function all_calander()
    {
        $slots = Calander::orderBy('created_at', 'desc')->get();
        return view('backend.calander_list', ['slots'=>$slots]);
    }
    public function class_display()
    {
        return view('backend.class');
    }
    public function class_create(Request $request){
        $this->validate($request,[
            'class' => 'required'
        ]);
        if(Role::isAdmin()){
            $class = new Classes;
            $class->class = $request['class'];
            $class->user_id = Auth::user()->id;
            $class->save();
            $classes = Classes::all();
            return redirect()->route('class_list')->with('classes', $classes);
        }
    }
    public function class_list(){
        if(Role::isAdmin()){
            $classes = Classes::all();
            return view('backend.class_list')->with('classes', $classes);
        }
    }
    public function user_profile($user_id)
    {
        $user = User::find($user_id);
        if($user->role == self::STUDENT){
            $profile = Student::where('user_id', $user->id)->first();
        }else $profile = false;
        return view('backend.user_profile', ['user'=>$user, 'profile'=>$profile]);
    }
}
