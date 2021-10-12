<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Teacher;
use App\Models\TeacherSchedule;
use App\Models\Term;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedules = TeacherSchedule::with(['teacher','term'])->paginate(10);
        $terms = Term::all();
        $teachers = Teacher::all();
        return view('pages.admin.schedule-teacher-menu.schedule-teacher-index',compact('schedules','terms','teachers'));
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
        $request->validate([
            'teacher' => 'required',
            'term' => 'required',
            'schedule' => 'required',
            'status' => 'required',
        ]);

        $schedule = new TeacherSchedule();
        $schedule->teacher_id = $request->input('teacher');
        $schedule->term_id = $request->input('term');
        $scheduleFile = $request->file('schedule');
        $filename = time().'.'.$scheduleFile->getClientOriginalName();
        $request->schedule->move(public_path('images/teacher_schedule') , $filename);
        $schedule->file_name=$filename;
        $schedule->status = $request->input('status');
        $schedule->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Teacher_Schedule";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new teacher schedule ($filename).";
        $log->action_name = $filename;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/teacher_schedules')->withSuccess('New teacher schedule has been added successfully..');
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
        $schedule = TeacherSchedule::find($id);
        return response($schedule,200);
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
            'teacher' => 'required',
            'term' => 'required',
            'status' => 'required',
        ]);

        $schedule = TeacherSchedule::find($id);
        $schedule->teacher_id = $request->input('teacher');
        $schedule->term_id = $request->input('term');

        if ($request->file('schedule') != null) {
            $scheduleFile = $request->file('schedule');
            $filename = time() . '.' . $scheduleFile->getClientOriginalName();
            $request->schedule->move(public_path('images/teacher_schedule') , $filename);
            $schedule->file_name = $filename;
        }

        $schedule->status = $request->input('status');
        $schedule->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Teacher_Schedule";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update teacher schedule ($schedule->file_name).";
        $log->action_name = $schedule->file_name;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/teacher_schedules')->withSuccess('Teacher schedule has been updated successfully..');
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
        $schedule = TeacherSchedule::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Teacher_Schedule";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete teacher schedule ($schedule->file_name).";
        $log->action_name = $schedule->file_name;
        $log->created_at = now();
        $log->save();

        $schedule->delete();

        return redirect('/admin/teacher_schedules')->withSuccess('Teacher schedule has been deleted successfully..');
    }
}
