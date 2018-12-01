<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Result;
use App\ResultItem;
use App\Setting;
use App\Role;
use App\Teacher;
use App\Classes;
use App\Calendar;

class FrontendController extends Controller
{
    protected const NOT_DELETED = 0,
                    ADMIN_DISAPPROVED = -1,
                    ADMIN_UNAPPROVED = 0,
                    ADMIN_APPROVED = 1;
    public function biodata(Request $request)
    {
        $user = Auth::user();
        if(Role::isStudent()){
            $update = false;
            $student = Student::where('user_id', $user->id)->first();
            if($student){
                $update = true;
            }else{
                $student = new Student();
            }
            $file = $request->file('passport');
            if($file){
                $name = $user->id.'_'.date('Y_m_d_His', time()).'_'.$file->getClientOriginalName();
                $student->filename = $name;
                Storage::disk('local')->put($name, File::get($file));
            }elseif($request['filename']){
                $student->filename = $request['filename'];
            }
            $student->name = $request['name'];
            $student->sex = $request['sex'];
            $student->dob = $request['dob'];
            $student->email = $request['email'];
            $student->phone = $request['phone'];
            $student->genotype = $request['genotype'];
            $student->blood_group = $request['blood_group'];
            $student->user_id = $user->id;
            if($update){
                $student->update();
            }else{
                $student->save();
            }
        }
        if(Role::isTeacher() || Role::isHOD()){
            $update = false;
            $teacher = Teacher::where('user_id', $user->id)->first();
            if($teacher){
                $update = true;
            }else{
                $teacher = new Teacher();
            }
            $file = $request->file('passport');
            if($file){
                $name = $user->id.'_'.date('Y_m_d_His', time()).'_'.$file->getClientOriginalName();
                $teacher->filename = $name;
                Storage::disk('local')->put($name, File::get($file));
            }elseif($request['filename']){
                $teacher->filename = $request['filename'];
            }
            $teacher->name = $request['name'];
            $teacher->sex = $request['sex'];
            $teacher->dob = $request['dob'];
            $teacher->email = $request['email'];
            $teacher->phone = $request['phone'];
            $teacher->user_id = $user->id;
            if($update){
                $teacher->update();
            }else{
                $teacher->save();
            }
        }
        $user->name = $request['name'];
        $user->update();
        return back()->with('success', 'Biodata updated');
    }
    public function change()
    {
        $profile = User::find(Auth::user()->id);
        return view('frontend.profile', ['profile'=>$profile]);
    }
    public function change_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:6'
        ]);
        $user = Auth::user();
        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
            $user->password = bcrypt($request['new_password']);
            $user->update();
            return back()->with('success', 'Password Changed');
        }else{
            return back()->with('error', 'Password does not match');
        }
    }
    public function results()
    {
        $results = Result::where(['student_id'=>Auth::user()->student->id, 'status'=>self::ADMIN_APPROVED])->get();
        return view('frontend.results', ['results'=>$results]);
    }
    public function result($result_id, $calendar_id, $class_id)
    {
        $positions = ResultItem::where(['calendar_id'=>$calendar_id, 'class_id'=>$class_id])->groupBy('result_id')->select('result_id', DB::raw('sum(score) as score, sum(t1) as t1, sum(t2) as t2'))->get();
        $pos = array();
        foreach($positions as $position){
            $pos[$position->result_id] = $position->t1 + $position->t2 + $position->score;
        }
        $positions = $pos;
        arsort($positions);
        $profile = Result::find($result_id);
        $setting = Setting::find(1);
        return view('frontend.result', ['setting'=>$setting, 'profile'=>$profile, 'positions'=>$positions]);
    }
    public function dashboard()
    {
        $classes = Classes::all();
        $students = Student::where('deleted', self::NOT_DELETED)->get();
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        return view('frontend.dashboard', ['classes'=> $classes, 'students'=>$students, 'teacher'=>$teacher]);
    }
    public function score(Request $request)
    {
        $this->validate($request, [
            'student' => 'required',
            'first_test' => 'required',
            'second_test' => 'required',
            'exam' => 'required'
        ]);
        $update = true;
        $current = Calendar::current_term();
        $result = Result::where('student_id', $request['student'])->where('session', $current->session)->where('term', $current->id)->first();
        if(!$result){
            $update = false;
            $result = new Result();
        }
        $result->student_id = $request['student'];
        $result->session = $current->session;
        $result->class_id = Student::current_class($request['student']);
        $result->term = $current->id;
        if($update){ $result->update();}
        else{ $result->save();}
        if($result){
            if(!$result->items()->where(
                [
                    'subject_id'=>$request['subject'],
                    'result_id'=>$result->id
                ]
            )->first()){
                $result_item = new ResultItem();
                $result_item->subject_id = $request['subject'];
                $result_item->result_id = $result->id;
                $result_item->teacher_id = Auth::user()->teacher->id;
                $result_item->t1 = $request['first_test'];
                $result_item->t2 = $request['second_test'];
                $result_item->score = $request['exam'];
                $result_item->calendar_id = $current->id;
                $result_item->class_id = Student::find($request['student'])->class;
                $result_item->save();
                return back()->with('success', 'Record Saved Successfully');
            }else{
                return back()->with('error', 'Record already exists');
            }
        }
    }
    public function attendance_register($class_id)
    {
        $students = Student::where('class', $class_id)->get();
        return view('frontend.attendance', compact('students'));
    }
}
