<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Setting;
use App\User;
use App\Subject;
use App\Student;
use App\Calendar;
use App\Role;
use App\Teacher;
use App\TeacherItem;
use App\Classes;
use App\Result;
use App\ResultItem;
use App\BestStudent;
class BackendController extends Controller
{
    protected const NOT_DELETED = 0, DELETED = 1, ADMIN_UNAPPROVED = 0, 
                    ADMIN_APPROVED = 1, ADMIN_DISAPPROVED = -1;
    public function home() {
        $team_members = User::whereIn('role', [Role::HOD, Role::PRINCIPAL])
                        ->orderBy('role', 'desc')->get();
        $best_students = BestStudent::where('calendar_id', Calendar::current_term()->id)
                        ->orderBy('class_id', 'asc')->get();
        return view('welcome', compact('best_students', 'team_members'));
    }
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
        if($request['type'] == Role::STUDENT){
            $validations = array(
                'name' => 'required|max:122',
                'email'   => 'required|email|unique:users',
                'password' => 'required|min:4',
                'class' => 'required'
            );
        }if($request['type'] == Role::TEACHER){
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
      if($request['type'] == Role::STUDENT){
        $student = new Student();
        $student->class = $request['class'];
      }else{
        $student = new Teacher();
      }
      $user = new User();
            $user->name = $student_name;
      $user->email = $student_email;
      $user->password = $student_password;
      $user->save();
      $student->name = $request['name'];
      $student->email = $request['email'];
      $student->user_id = User::orderBy('id', 'desc')->first()->id;
      $student->save();
      if($request['type'] == Role::TEACHER){
        $user->role = Role::TEACHER;
        $teacher_item = new TeacherItem();
        $teacher_item->teacher_id = Teacher::orderBy('id', 'desc')->first()->id;
        $teacher_item->subject_id = $request['subject'];
        $teacher_item->save();
      }
      return redirect()->route('admin');
    }
    public function student()
    {
        $slots = User::where(['role'=>Role::STUDENT, 'deleted'=>self::NOT_DELETED])->get();
        return view('backend.student', ['slots' => $slots]);
    }
    public function teacher()
    {
        $slots = User::where(['deleted'=>self::NOT_DELETED])
                ->whereIn('role', [Role::TEACHER, Role::HOD])->get();
        return view('backend.teacher', ['slots' => $slots]);
    }
    public function users()
    {
        $slots = User::where('deleted', self::NOT_DELETED)->get();
        return view('backend.users', ['slots' => $slots]);
    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        $subjects = Subject::all();
        return view('backend.user_edit', ['user' => $user, 'subjects'=>$subjects]);
    }
    public function update(Request $request)
    {
        $user = User::find($request['id']);

        if($request['role'] == Role::PRINCIPAL){
            $principal = User::where(['role'=>Role::PRINCIPAL])->first();
            if($principal){
                $principal->role = Role::TEACHER;
                $principal->update();
            }
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $teacher = Teacher::where('user_id', $user->id)->first();
        $subjects = $request['subject'];
        if($subjects){
            foreach($subjects as $subject){
                $update = false;
                $item = TeacherItem::where(['subject_id'=>$subject, 'teacher_id'=>$teacher->id])->first();
                if($item){
                    $update = true;
                }else
                $item = new TeacherItem();
                $item->subject_id = $subject;
                $item->teacher_id = $teacher->id;
                if($update)
                $item->update();
                else
                $item->save();
            }
        }
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
        if($user->student){
            $user->student->deleted = self::DELETED;
            $user->student->update();
        }
        elseif($user->teacher){
            $user->teacher->deleted = self::DELETED;
            $user->teacher->update();
        }
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
            $calander = new Calendar();
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
        $slots = Calendar::orderBy('created_at', 'desc')->get();
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
        if($user->role == Role::STUDENT){
            $profile = Student::where('user_id', $user->id)->first();
        }elseif($user->role == Role::TEACHER || $user->role == Role::HOD){
            $profile = Teacher::where('user_id', $user->id)->first();
        }
        else $profile = false;
        return view('backend.user_profile', ['user'=>$user, 'profile'=>$profile]);
    }
    public function results()
    {
        $classes = Classes::all();
        $results = Result::orderBy('class_id','desc')->orderBy('session', 'desc')
                   ->orderBy('term', 'desc')->paginate(10);
        return view('backend.results', ['results'=>$results, 'classes'=>$classes]);
    }
    public function approve_results($result_id)
    {
        $result = Result::find($result_id);
        $result->status = self::ADMIN_APPROVED;
        $result->update();
        return back(); 
    }
    public function search_route($class_id)
    {

        $classes = Classes::all();
        $results = Result::where(['term'=> Calendar::current_term()->id, 'class_id'=>$class_id])->orderBy('class_id','desc')->orderBy('session', 'desc')->orderBy('term', 'desc')->paginate(10);
        return view('backend.results', ['results'=>$results, 'classes'=>$classes]);
    }
    public function make_best_students($class_id)
    {
        $position = ResultItem::where(['calendar_id'=> Calendar::current_term()
                                ->id, 'class_id'=>$class_id])->groupBy('result_id', 'class_id')
                                ->select('result_id','class_id', DB::raw('sum(score) + sum(t1) + sum(t2) as score'))
                                ->orderBy('score', 'desc')->first();

        if($position){
            $update = false;
            $best_student = BestStudent::where(
                            [
                                'calendar_id' => $position->result->term,
                                'class_id' => $position->result->class_id,
                            ])->first();
            if($best_student) $update = true;
            else $best_student = new BestStudent();
            $best_student->name = $position->result->student->name;
            $best_student->filename = $position->result->student->filename;
            $best_student->student_id = $position->result->student_id;
            $best_student->calendar_id = $position->result->term;
            $best_student->class_id = $position->result->class_id;
            $best_student->phone = $position->result->student->phone;
            if($update) $best_student->update();
            else $best_student->save();
            return back()->with('success', $position->result->student->name.' is the best student in class '. $position->result->class_id );
        }
           // dd($position->result->student->name);

        // $pos = array();
        // foreach($positions as $position){
        //     $pos[$position->result_id] = $position->t1 + $position->t2 + $position->score;
        // }
        // $positions = $pos;
        // arsort($positions);
        dd($positions);
    }
}
