<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Notification;
use App\Models\Question;
use App\Models\StudentAnswer;
use App\Models\StudentAssignment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::where('level_id',Auth::user()->level_id)->where('term_id',Auth::user()->term_id)
            ->where('exam_time','>=',Carbon::today('Asia/Riyadh'))->with(['teachersExams','subjectsExams'])->where('status',1)->get();
        return view('pages.user.exam-menu.exam-index',compact('exams'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $totalMark = 0;
        $questions = $request->questions;
        foreach ($questions as $k => $question) {
            $correct = Question::where('id',$k)->first();
            $mark = ($question == $correct->correct_answer ? $correct->mark : 0);

            $answer = new StudentAnswer();
            $answer->student_id = Auth::id();
            $answer->level_id = Auth::user()->level_id;
            $answer->term_id = Auth::user()->term_id;
            $answer->subject_id = $request->subject;
            $answer->exam_id = $request->exam;
            $answer->question_id = $k;
            $answer->student_answer = $question;
            $answer->correct_answer = $correct->correct_answer;
            $answer->mark = $mark;
            $answer->status = 1;
            $answer->save();

            $totalMark += $mark;
        }
        $absence = Attendance::where('student_id',Auth::id())->where('subject_id',$request->subject)
            ->where('level_id',Auth::user()->level_id)->where('term_id',Auth::user()->term_id)->where('status',0)->count();
        $attendanceMark = 20-(round($absence/2,2));
        $assignmentMark = StudentAssignment::where('student_id',Auth::id())->where('subject_id',$request->subject)->sum('mark');

        $marks = new Mark();
        $marks->teacher_id = $request->teacher;
        $marks->student_id = Auth::id();
        $marks->subject_id = $request->subject;
        $marks->term_id = Auth::user()->term_id;
        $marks->level_id = Auth::user()->level_id;
        $marks->exam_id = $request->exam;
        $marks->attendance_mark = $attendanceMark;
        $marks->assignments_mark = $assignmentMark;
        $marks->exams_mark = $totalMark;
        $marks->status = 0;
        $marks->save();

        $name= Auth::user()->student_name;
        $notification = new Notification();
        $notification->type = 2;
        $notification->title = "Student complete exam";
        $notification->details = "Student ($name) complete the exam.";
        $notification->url = "/teacher/mark";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        if (Auth::user()->term_id == 1){
            User::where('id',Auth::id())->update(['term_id'=>2]);
        }

        return redirect('/exam')->withSuccess('Congratulations you have end your exam');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::where('id',$id)->with(['questions','teachersExams','subjectsExams'])->first();
        $answers = StudentAnswer::where('student_id',Auth::id())->where('level_id',Auth::user()->level_id)
            ->where('term_id',Auth::user()->term_id)->where('exam_id',$id)->count();
        $time = new Carbon($exam->exam_time,'Asia/Riyadh');
        if($answers == 0 && Carbon::now('Asia/Riyadh') >= $time && Carbon::now('Asia/Riyadh') <= $time->addMinutes($exam->duration_m)) {
            $duration = $exam->duration_m - \Illuminate\Support\Carbon::now('Asia/Riyadh')->diffInMinutes($exam->exam_time);
            return view('pages.user.exam-menu.exam-show', compact('exam', 'duration'));
        }
        return redirect('/exam');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
