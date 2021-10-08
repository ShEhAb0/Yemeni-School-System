<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\Term;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = TeacherSubject::with(['subject','teacher','term','grade'])->paginate(10);
        $terms = Term::all();
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.admin.subject-menu.subject-index', compact('subjects','terms','grades','teachers'));

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
           'subject_name' => 'required',
           'subject_code' => 'required',
            'term' => 'required',
            'grade' => 'required',
            'teacher' => 'required',
            'status' => 'required'
        ]);

        $subject = new Subject();
        $subject->subject_name = $request->input('subject_name');
        $subject->subject_code = $request->input('subject_code');
        $subject->term_id = $request->input('term');
        $subject->level_id = $request->input('grade');
        $subject->has_teacher = 1;
        $subject->status = $request->input('status');
        $subject->save();

        $ts = new TeacherSubject();
        $ts->teacher_id = $request->teacher;
        $ts->subject_id = $subject->id;
        $ts->level_id = $subject->level_id;
        $ts->term_id = $subject->term_id;
        $ts->assign_date = now();
        $ts->status = 1;
        $ts->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Subject";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new subject ($subject->subject_name).";
        $log->action_name = $subject->subject_name;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/subjects')->withSuccess('New subject has been added successfully..');
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
        $subject = Subject::find($id);
        return response($subject,200);
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
            'subject_name' => 'required',
            'subject_code' => 'required',
            'term' => 'required',
            'grade' => 'required',
            'teacher' => 'required',
            'status' => 'required'
        ]);

        $subject = Subject::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Subject";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update subject ($subject->subject_name) to ($request->subject_name).";
        $log->action_name = $request->subject_name;
        $log->created_at = now();
        $log->save();

        $subject->subject_name = $request->input('subject_name');
        $subject->subject_code = $request->input('subject_code');
        $subject->term_id = $request->input('term');
        $subject->level_id = $request->input('grade');
        $subject->status = $request->input('status');
        $subject->save();

        $ts = TeacherSubject::where('subject_id',$id)->first();
        $ts->teacher_id = $request->teacher;
        $ts->level_id = $subject->level_id;
        $ts->term_id = $subject->term_id;
        $ts->assign_date = now();
        $ts->status = 1;
        $ts->save();

        return redirect('/admin/subjects')->withSuccess('Subject has been updated successfully..');
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
        $subject = Subject::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Subject";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete subject ($subject->subject_name).";
        $log->action_name = $subject->subject_name;
        $log->created_at = now();
        $log->save();

        $subject->delete();

        return redirect('/admin/subjects')->withSuccess('Subject has been deleted successfully..');


    }
}
