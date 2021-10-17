<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Subject;
use App\Models\Term;
use Carbon\Carbon;
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
        $terms = Term::all();
        $attendances = Attendance::where('subject_id',0)->get();
        $total = $attendances->count();
        $absence = Attendance::where('subject_id',0)->count();
        $presence = Attendance::where('subject_id',0)->count();
        return view('pages.user.attendance-menu.attendance-index',compact('terms','attendances','total','absence','presence'));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $check = Attendance::where('student_id',Auth::id())->where('subject_id',$request->subject)
            ->where('level_id',Auth::user()->level_id)->where('term_id',$request->term)
            ->where('lesson_id',$request->lesson)->get();
        if(!$check->count()) {
            $now = Carbon::now('Asia/Riyadh');
            $dif = $now->diffInHours($request->date);

            $attendance = new Attendance();
            $attendance->student_id = Auth::id();
            $attendance->subject_id = $request->subject;
            $attendance->level_id = Auth::user()->level_id;
            $attendance->term_id = $request->term;
            $attendance->lesson_id = $request->lesson;
            $attendance->lesson_creation_date = $request->date;
            $attendance->view_date = $now;
            $attendance->mark = ($dif <= 24 ? 1 : 0);
            $attendance->status = ($dif <= 24 ? 1 : 0);
            $attendance->save();
        }

        return redirect('/lesson/'.$request->lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subjects = Subject::where('term_id',$id)->where('level_id',Auth::user()->level_id)->where('status',1)->get();
        if ($subjects->count() > 0) {
            $data = '<option value="" disabled selected>Select the subject</option>';
            foreach ($subjects as $subject) {
                $data .= '
            <option value="' . $subject->id . '">' . $subject->subject_name . '</option>
            ';
            }
            return response($data,200);
        }
        return response('',201);
    }

    public function showAttendance($term, $subject){
        $attendances = Attendance::where('student_id',Auth::id())->where('subject_id',$subject)
            ->where('level_id',Auth::user()->level_id)->where('term_id',$term)->with('lessonsAttendances')->get();
        $total = $attendances->count();
        $absence = Attendance::where('student_id',Auth::id())->where('subject_id',$subject)
            ->where('level_id',Auth::user()->level_id)->where('term_id',$term)->where('status',0)->count();
        $presence = Attendance::where('student_id',Auth::id())->where('subject_id',$subject)
            ->where('level_id',Auth::user()->level_id)->where('term_id',$term)->where('status',1)->count();
        return view('pages.user.attendance-menu.attendance-table',compact('attendances','total','absence','presence'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
