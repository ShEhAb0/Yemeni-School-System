<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::all();
        $terms = Term::all();
        $grades = Grade::all();

        return view('pages.admin.student-menu.student-index' , compact('students' ,'terms' , 'grades'));

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
            'student_name' => 'required|max:50',
            'username' => 'required|unique:users,username|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'phone' => 'numeric',
            'address' => 'required',
            'term' => 'required',
            'grade' => 'required',
            'status' => 'required',

        ]);
        $student = new User();
        $student->student_name = $request->input('student_name');
        $student->username = $request->input('username');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password'));
        $student->gender = $request->input('gender');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');

        $student->term_id = $request->input('term');
        $student->level_id = $request->input('grade');

        $student->status = $request->input('status');
        $student->save();


        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Student";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new student ($student->student_name).";
        $log->action_name = $student->student_name;
        $log->created_at = now();
        $log->save();


        return redirect('/admin/students')->withSuccess('New student has been added successfully..!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $student = User::find($id);
        return response($student,200);
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
        $this->validate($request ,[
            'student_name' => 'required|max:50',
            'username' => "required|unique:users,username,$id|min:3",
            'email' => "required|unique:users,email,$id",
            'gender' => 'required',
            'phone' => 'numeric',
            'address' => 'required',
            'level_id' => 'required',
            'term_id' => 'required',
            'status' => 'required',

        ]);
            $student = User::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Student";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update student ($student->student_name) to ($request->student_name).";
        $log->action_name = $request->student_name;
        $log->created_at = now();
        $log->save();


        $student->student_name = $request->input('student_name');
        $student->username = $request->input('username');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password'));
        $student->gender = $request->input('gender');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->level_id = $request->input('level_id');
        $student->term_id = $request->input('term_id');
        $student->status = $request->input('status');
        $student->save();

        return redirect('/admin/students')->withSuccess('Student has been updated successfully..!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Student";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete student ($student->student_name).";
        $log->action_name = $student->student_name;
        $log->created_at = now();
        $log->save();

        $student->delete();

        return redirect('/admin/students')->withSuccess('Student has been deleted successfully..!');
    }
}
