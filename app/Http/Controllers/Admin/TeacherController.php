<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::get();
        return view('pages.admin.teacher-menu.teacher-index')->with('teachers' , $teacher);;

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
        $this->validate($request ,[
            'teacher_name' => 'required',
            'username' => 'required|max:20',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'teacher_education_certificate' => 'required',
            'teacher_id_or_passport' => 'required',
            'status' => 'required',

        ]);

        $teacher =  new Teacher();
        $teacher->teacher_name = $request->input('teacher_name');
        $teacher->username = $request->input('username');
        $teacher->email = $request->input('email');
        $teacher->password = Hash::make($request->input('password'));
        $teacher->gender = $request->input('gender');
        $teacher->phone = $request->input('phone');
        $teacher->address = $request->input('address');


        //$teacher_certificate = $request->file('teacher_certificate');

        $teacher_education_certificate = $request->file('teacher_education_certificate');
        $filename = time().'.'.$teacher_education_certificate->getClientOriginalExtension();
        $request->teacher_education_certificate->move(public_path('images/teachers_certificates') , $filename);
        $teacher->teacher_education_certificate=$filename;



        $teacher_id_or_passport = $request->file('teacher_id_or_passport');
        $filename = time().'.'.$teacher_id_or_passport->getClientOriginalName();
        $request->teacher_id_or_passport->move(public_path('images/teachers_IDs') , $filename);
        $teacher->teacher_id_or_passport=$filename;

        $teacher->status = $request->input('status');
        $teacher->save();


        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Teacher";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new teacher ($teacher->teacher_name).";
        $log->action_name = $teacher->teacher_name;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/teachers')->withSuccess('New teacher has been added successfully..!');

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
        $teacher = Teacher::find($id);
        return response($teacher,200);
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
        $request->validate([
            'teacher_name' => 'required',
            'username' => 'required|max:20',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'teacher_education_certificate' => 'required',
            'teacher_id_or_passport' => 'required',
            'status' => 'required',

        ]);

        $teacher = Teacher::find($id);

            $log = new AdminLog();
            $log->admin_id = Auth::id();
            $log->action = "Update_Teacher";
            $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update teacher ($teacher->teacher_name) to ($request->grade_name).";
            $log->action_name = $request->teacher_name;
            $log->created_at = now();
            $log->save();

            $teacher->teacher_name = $request->input('teacher_name');
            $teacher->username = $request->input('username');
            $teacher->email = $request->input('email');
            $teacher->password = Hash::make($request->input('password'));
            $teacher->gender = $request->input('gender');
            $teacher->phone = $request->input('phone');
            $teacher->address = $request->input('address');

//        $teacher_education_certificate = $request->file('teacher_education_certificate');
//        $filename = time().'.'.$teacher_education_certificate->getClientOriginalExtension();
//        $request->teacher_education_certificate->move(public_path('images/teachers_certificates') , $filename);
//        $teacher->teacher_education_certificate=$filename;
//
//
//
//        $teacher_id_or_passport = $request->file('teacher_id_or_passport');
//        $filename = time().'.'.$teacher_id_or_passport->getClientOriginalName();
//        $request->teacher_id_or_passport->move(public_path('images/teachers_IDs') , $filename);
//        $teacher->teacher_id_or_passport=$filename;

        $teacher->status = $request->input('status');
        $teacher->save();

        return redirect('/admin/teachers')->withSuccess('Teacher has been updated successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Teacher";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete teacher ($teacher->teacher_name).";
        $log->action_name = $teacher->teacher_name;
        $log->created_at = now();
        $log->save();

        $teacher->delete();
        return redirect('/admin/teachers')->withSuccess('Teacher has been deleted successfully..!');
    }
}






