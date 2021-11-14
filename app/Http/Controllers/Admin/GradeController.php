<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\AdminLog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grades = Grade::with('students')->paginate(10);
        return view('pages.admin.grade-menu.grade-index' )->with('grades' , $grades);

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
           'grade_name' => 'required',
           'grade_code' => 'required',
           'status' => 'required',
        ]);

        $grade = new Grade();
        $grade->grade_name = $request->input('grade_name');
        $grade->grade_code = $request->input('grade_code');
        $grade->status = $request->input('status');
        $grade->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Grade";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new grade ($grade->grade_name).";
        $log->action_name = $grade->grade_name;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/grades')->withSuccess('New grade has been added successfully..!');
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
        $grade = Grade::find($id);
        return response($grade,200);
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
            'grade_name' => 'required',
            'grade_code' => 'required',
            'status' => 'required',
        ]);

        $grade = Grade::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Grade";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update grade ($grade->grade_name) to ($request->grade_name).";
        $log->action_name = $request->grade_name;
        $log->created_at = now();
        $log->save();

        $grade->grade_name = $request->input('grade_name');
        $grade->grade_code = $request->input('grade_code');
        $grade->status = $request->input('status');
        $grade->save();

        return redirect('/admin/grades')->withSuccess('Grade has been updated successfully..!');
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
        $grade = Grade::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Grade";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete grade ($grade->grade_name).";
        $log->action_name = $grade->grade_name;
        $log->created_at = now();
        $log->save();

        $grade->delete();

        return redirect('/admin/grades')->withSuccess('Grade has been deleted successfully..!');
    }
}
