<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;
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
        return view('pages.parent.profile');

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
        $ppro = Parents::where('id' , $id)->get();
        return view('pages.parent.profile',compact('ppro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppro = Parents::find($id);
        return response($ppro,200);
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
            'username' => "required|unique:parents,username,$id|min:3",
            'email' => "required|unique:parents,email,$id",
            'phone' => 'numeric',
            'address' => 'required',

        ]);

        $ppro = Parents::find($id);
        $ppro->username = $request->input('username');
        $ppro->phone = $request->input('phone');
        $ppro->email = $request->input('email');
        $ppro->address = $request->input('address');
        if ($request->input('password') != null) {
            $ppro->password = Hash::make($request->input('password'));
        }
        if ($request->file('upload') != null)
        {
            $path = public_path().'/images/parentsProfiles/';
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $parentProfile = $request->file('upload');
            $filename = time() . '.' . $parentProfile->getClientOriginalName();
            $request->upload->move($path, $filename);
            $ppro->image=$filename;

            $ppro->save();

            //    Teacher::find($id)->update(['image'=>$filename]);
        }


        //$teacherProfile = $request->file('image');
//        $filename = time().'.'.$teacherProfile->getClientOriginalName();
//        $request->teacherProfile->move(public_path('images/teachers_profiles') , $filename);
//        $tpro->imge=$filename;

        return redirect('/parent/profile/'.$id)->withSuccess('Profile has been updated successfully..!');

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
