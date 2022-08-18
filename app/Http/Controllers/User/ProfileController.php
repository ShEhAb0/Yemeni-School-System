<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
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
        $student = User::where('id',Auth::id())->get();
        return view('pages.user.profile' , compact('student'));

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
        $upro = User::where('id' , $id)->get();
        return view('pages.user.profile',compact('upro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upro = User::find($id);
        return response($upro,200);
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
            'username' => "required|unique:users,username,$id|min:3",
            'email' => "required|unique:users,email,$id",
            'phone' => 'numeric',
            'address' => 'required',
        ]);

//        if ($request->input('password') != null){
//            $request->validate([
//                'password' => 'required|min:6'
//            ]);
//        }

        $upro = User::find($id);

        $upro->username = $request->input('username');
        $upro->email = $request->input('email');
        $upro->phone = $request->input('phone');
        $upro->address = $request->input('address');
        if ($request->input('password') != null) {
            $upro->password = Hash::make($request->input('password'));
        }

        if ($request->file('upload') != null)
        {
            $path = public_path().'/images/usersProfiles/';
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $userProfile = $request->file('upload');
            $filename = time() . '.' . $userProfile->getClientOriginalName();
            $request->upload->move($path, $filename);
            $upro->image=$filename;

            $upro->save();

        }


        return redirect('/profile/'.$id)->withSuccess('Profile has been updated successfully..');

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
