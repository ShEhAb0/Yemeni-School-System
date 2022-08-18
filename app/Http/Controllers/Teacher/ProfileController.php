<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.teacher.profile');

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
        $tpro = Teacher::where('id' , $id)->get();
        return view('pages.teacher.profile',compact('tpro'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tpro = Teacher::find($id);
        return response($tpro,200);
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
            'username' => "required|unique:teachers,username,$id|min:3",
            'email' => "required|unique:teachers,email,$id",
            'phone' => 'numeric',
            'address' => 'required',

        ]);

        $tpro = Teacher::find($id);
        $tpro->username = $request->input('username');
        $tpro->phone = $request->input('phone');
        $tpro->email = $request->input('email');
        $tpro->address = $request->input('address');
        if ($request->input('password') != null) {
            $tpro->password = Hash::make($request->input('password'));
        }
        if ($request->file('upload') != null)
        {
            $path = public_path().'/images/teachersProfiles/';
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $teacherProfile = $request->file('upload');
            $filename = time() . '.' . $teacherProfile->getClientOriginalName();
            $request->upload->move($path, $filename);
            $tpro->image=$filename;

            $tpro->save();

        //    Teacher::find($id)->update(['image'=>$filename]);
        }


        //$teacherProfile = $request->file('image');
//        $filename = time().'.'.$teacherProfile->getClientOriginalName();
//        $request->teacherProfile->move(public_path('images/teachers_profiles') , $filename);
//        $tpro->imge=$filename;

        return redirect('/teacher/profile/'.$id)->withSuccess('Profile has been updated successfully..!');

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
