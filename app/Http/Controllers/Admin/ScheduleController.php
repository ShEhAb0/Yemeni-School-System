<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Term;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with(['grade','term'])->paginate(10);
        $terms = Term::all();
        $grades = Grade::all();
        return view('pages.admin.schedule-menu.schedule-index',compact('schedules','terms','grades'));

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
           'level' => 'required',
           'term' => 'required',
           'schedule' => 'required',
           'status' => 'required',
        ]);

        $schedule = new Schedule();
        $schedule->level_id = $request->input('level');
        $schedule->term_id = $request->input('term');
        $scheduleFile = $request->file('schedule');
        $filename = time().'.'.$scheduleFile->getClientOriginalName();
        $request->schedule->move(public_path('images/grade_schedule') , $filename);
        $schedule->file_name=$filename;
        $schedule->status = $request->input('status');
        $schedule->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Grade_Schedule";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new grade schedule ($filename).";
        $log->action_name = $filename;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/schedules')->withSuccess('New grade schedule has been added successfully..');
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
