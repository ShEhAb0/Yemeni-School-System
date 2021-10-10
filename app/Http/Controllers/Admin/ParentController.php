<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\User;
use App\Models\UserParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent = Parents::all();
        $users = User::all('student_name');
        return view('pages.admin.parent-menu.parent-index' , compact('users') )->with('parents' , $parent);

    }

    public function getStudents()
    {
        $students = User::pluck('student_name');
        return view('pages.admin.parent-menu.parent-index' , compact('students'));
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
        $request->validate([
            'parent_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'parent_id_or_passport' => 'required',
            'user' => 'required',
            'status' => 'required',
        ]);


        $parent = new Parents();
        $parent->parent_name = $request->input('parent_name');
        $parent->username = $request->input('username');
        $parent->email = $request->input('email');
        $parent->password = Hash::make($request->input('password'));
        $parent->gender = $request->input('gender');
        $parent->address = $request->input('address');
        $parent->phone = $request->input('phone');

        $parent->parent_id_or_passport = $request->input('parent_id_or_passport');
        $parent_id_or_passport = $request->file('parent_id_or_passport');
        $filename = time().'.'.$parent_id_or_passport->getClientOriginalExtension();
        $request->parent_id_or_passport->move(public_path('images/parents_IDs') , $filename);
        $parent->parent_id_or_passport=$filename;

        $parent->status = $request->input('status');
        $parent->save();

        DB::table('users_parents')->insert(['parent_id'=>$parent->id, 'user_id'=>$request->input('user')]);

//        $user = new UserParent();
//        $parent -> parent_id = Input::get('parent_id');
//        $user->user_id= Input::get('user_id');
//        $user->save();

        return redirect('/admin/parents')->withSuccess('New parent has been added successfully..!');


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
