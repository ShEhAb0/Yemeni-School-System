<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\StudentAssignment;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()

    {
        $subject = TeacherSubject::where('teacher_id' ,  Auth::id())->pluck('subject_id');

        //$assignment = Assignment::where('id' , Auth::id())->with('assignmentComments')->first();

        $answers = StudentAssignment::whereIn('subject_id',$subject)->where('status',0)->with(['student','subjects'])->get();

        return view('pages.teacher.index' , compact(  'answers'));
    }

}
