<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();

        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
            return $row->take(1);
        });
        $attendances = Attendance::where('subject_id',0)->paginate(10);
//        $total = $attendances->count();
//        $absence = Attendance::where('subject_id',0)->count();
//        $presence = Attendance::where('subject_id',0)->count();

        return view('pages.teacher.attendance-menu.attendance-index' , compact('grades','attendances'));

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
        $subjects = TeacherSubject::where('teacher_id',Auth::id())->where('level_id',$id)->where('status',1)->with('subject')->get();
//        $subjects = Subject::where('level_id',Auth::user()->level_id)->where('status',1)->get();
        if ($subjects->count() > 0) {
            $data = '<option value="" disabled selected>Select the subject</option>';
            foreach ($subjects as $subject) {
                $data .= '
            <option value="' . $subject->subject_id . '">' . $subject->subject->subject_name . '</option>
            ';
            }
            return response($data,200);
        }
        return response('',201);
    }

    public function showAttendance($grade, $subject){
        $attendances = Attendance::where('level_id',$grade)->where('subject_id',$subject)
            ->with(['lessonsAttendances','student'])->orderBy('lesson_id','asc')->paginate(10);
//        $total = $attendances->count();
//        $absence = Attendance::where('student_id',Auth::id())->where('subject_id',$subject)
//            ->where('level_id',Auth::user()->level_id)->where('grade_id',$grade)->where('status',0)->count();
//        $presence = Attendance::where('student_id',Auth::id())->where('subject_id',$subject)
//            ->where('level_id',Auth::user()->level_id)->where('grade_id',$grade)->where('status',1)->count();
        return view('pages.teacher.attendance-menu.attendance-table',compact('attendances'))->render();

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
