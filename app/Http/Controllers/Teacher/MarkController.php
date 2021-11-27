<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Models\MarkSetting;
use App\Models\TeacherSubject;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::where('teacher_id',Auth::id())->with(['student'])->where('status',0)->paginate(10);
        $terms = Term::all();
        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();
        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
            return $row->take(1);
        });
        return view('pages.teacher.mark-menu.mark-index',compact('marks','terms','teacher_sub','grades'));

    }

    public function showMarks($grade,$subject,$term)
    {
        $marks = Mark::where('teacher_id',Auth::id())->where('level_id',$grade)->where('subject_id',$subject)->where('term_id',$term)->with(['student'])->where('status',0)->paginate(10);
        return view('pages.teacher.mark-menu.mark-table',compact('marks'));

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
        $mark = Mark::find($id);
        $student = User::find($mark->student_id);
        User::where('id',$student->id)->update(['level_id'=>$student->level_id+1,'term_id'=>1]);
        $mark->status = 1;
        $mark->save();
        return redirect('/teacher/mark')->withSuccess('Student has been upgrade successfully.');
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
        $request->validate([
           'attend' => 'required',
           'assign' => 'required',
        ]);

        $mark = Mark::find($id);
        $mark->attendance_mark = $request->attend;
        $mark->assignments_mark = $request->assign;
        $mark->save();
        Mark::where('id',$id)->update(['total'=>$mark->attendance_mark+$mark->assignments_mark+$mark->exams_mark]);
        return redirect('/teacher/mark')->withSuccess('Data has been updated successfully.');
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
