<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Grade;
use App\Models\News;
use App\Models\StudentAssignment;
use App\Models\Subject;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()

    {
        $subject = TeacherSubject::where('teacher_id' ,  Auth::id())->pluck('level_id','subject_id');
        $assignments = TeacherSubject::where('teacher_id' ,  Auth::id())->with('assignment')->get();
//        dd($assignments);
        $students = User::whereIn('level_id',$subject->unique()->values())->count();
        //$grades = User::where('level_id',$subject->unique()->values())->count();
        //$grades = TeacherSubject::where('teacher_id',Auth::id())->get();
        $subjects = Subject::where('level_id',Auth::user()->level_id)->get();

        //$assignment = Assignment::where('id' , Auth::id())->with('assignmentComments')->first();

        $answers = StudentAssignment::whereIn('subject_id',$subject)->where('status',0)->with(['student','subjects'])->orderBy('created_at','desc')->get();
       // $answers = StudentAssignment::whereIn('subject_id',$subject)->where('status',0)->with(['student','subjects'])->orderBy('created_at','desc')->get();

        $news = News::whereIn('type',[0,2])->where('status',1)->orderBy('created_at','desc')->get();

        return view('pages.teacher.index' , compact(  'answers','assignments' , 'subject','students' , 'news' ,'subjects' ));

    }

}
