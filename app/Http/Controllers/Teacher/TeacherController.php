<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\StudentAssignment;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()

    {
        $subject = TeacherSubject::where('teacher_id' ,  Auth::id())->pluck('level_id','subject_id');
        $students = User::whereIn('level_id',$subject->unique()->values())->count();
        //$assignment = Assignment::where('id' , Auth::id())->with('assignmentComments')->first();

        $answers = StudentAssignment::whereIn('subject_id',$subject)->where('status',0)->with(['student','subjects'])->get();

        return view('pages.teacher.index' , compact(  'answers','subject','students'));
    }

}
