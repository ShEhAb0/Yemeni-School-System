<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\TeacherSubject;
use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
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
        $exams = Exam::where('teacher_id',Auth::id())->paginate(10);
        $terms = Term::all();
        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();
        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
            return $row->take(1);
        });
        return view('pages.teacher.exam-menu.exam-index',compact('exams','terms','teacher_sub','grades'));

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
        if ($request->has('add_exam')){

            $request->validate([
               'title' => 'required',
               'term' => 'required',
               'grade' => 'required',
               'subject' => 'required',
               'date' => 'required',
               'duration' => 'required',
               'status' => 'required',
            ]);

            $exam = new Exam();
            $exam->teacher_id = Auth::id();
            $exam->exam_title = $request->title;
            $exam->level_id = $request->grade;
            $exam->term_id = $request->term;
            $exam->subject_id = $request->subject;
            $exam->created_at = Carbon::now('Asia/Riyadh');
            $exam->exam_time = $request->date;
            $exam->duration_m = $request->duration;
            $exam->status = $request->status;
            $exam->total_ques = 0;
            $exam->save();

            return redirect('/teacher/exam')->withSuccess('New Exam has been added successfully..');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if ($request->has('update_exam')){

            $request->validate([
                'title' => 'required',
                'term' => 'required',
                'grade' => 'required',
                'subject' => 'required',
                'date' => 'required',
                'duration' => 'required',
                'status' => 'required',
            ]);

            $exam = Exam::find($id);
            $exam->teacher_id = $request->teacher_id;
            $exam->exam_title = $request->title;
            $exam->level_id = $request->grade;
            $exam->term_id = $request->term;
            $exam->subject_id = $request->subject;
            $exam->created_at = Carbon::now('Asia/Riyadh');
            $exam->exam_time = $request->date;
            $exam->duration_m = $request->duration;
            $exam->status = $request->status;
            $exam->save();

            return redirect('/teacher/exam')->withSuccess('Exam has been updated successfully..');

        }
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
