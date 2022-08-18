<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use File;

class SchoolSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_settings = SchoolSetting::first();

        return view('pages.admin.school-setting-menu.school-setting-index' , compact('school_settings'));

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
            'school_name' => 'required',
            'school_phone' => 'required',
            'school_email' => 'required',
            'school_address' => 'required',
            'academic_year' =>'required',
            'first_term_begin' => 'required',
            'first_term_end' => 'required',
            'second_term_begin' => 'required',
            'second_term_end' => 'required',
//            'school_logo' => 'required|mimes:jpg,png,jpeg',
        ]);
//        $input = $request->all();


//        if ($school_logo = $request->file('school_logo')) {
//
//            $destinationPath =('images/school_logo/');
//            $logoImage =  $school_logo->getClientOriginalName();
//            $school_logo->move(public_path($destinationPath) , $logoImage );
//            $input['school_logo'] = "$logoImage";
//        }

        $sc = new SchoolSetting();
        $sc->school_name = $request->school_name;
        $sc->school_phone = $request->school_phone;
        $sc->school_email = $request->school_email;
        $sc->academic_year = $request->academic_year;
        $sc->school_address = $request->school_address;
        $sc->first_term_begin = $request->first_term_begin;
        $sc->first_term_end = $request->first_term_end;
        $sc->second_term_begin = $request->second_term_begin;
        $sc->second_term_end = $request->second_term_end;

        if ($request->file('schoollogo') != null) {
            $path = public_path().'/images/school_logo/';
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $sc = $request->file('schoollogo');
            $filename = time() . '.' . $sc->getClientOriginalExtension();
            $request->school_logo->move($path, $filename);
        }


//        $sc = $request->file('school_logo');
//        $filename = time().'.'.$sc->getClientOriginalName();
//        $request->school_logo->move(public_path('images/school_logo') , $filename);
//        $sc->school_logo=$filename;

        $sc->save();
        return redirect('/admin/school/settings')->withSuccess('Settings has been inserted successfully..!');

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
        $sc = SchoolSetting::find($id);
        return response($sc,200);
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
            'school_name' => 'required',
            'school_phone' => 'required',
            'school_email' => 'required',
            'academic_year' => 'required',
            'school_address' => 'required',
            'first_term_begin' => 'required',
            'first_term_end' => 'required',
            'second_term_begin' => 'required',
            'second_term_end' => 'required',

        ]);

        $sc = SchoolSetting::find($id);
        $sc->school_name = $request->input('school_name');
        $sc->school_phone = $request->input('school_phone');
        $sc->school_email = $request->input('school_email');
        $sc->academic_year = $request->input('academic_year');
        $sc->school_address = $request->input('school_address');
        $sc->first_term_begin = $request->input('first_term_begin');
        $sc->first_term_end = $request->input('first_term_end');
        $sc->second_term_begin = $request->input('second_term_begin');
        $sc->second_term_end = $request->input('second_term_end');




        if ($request->file('school_logo') != null) {
            $path = public_path().'/images/school_logo/'.$sc->school_logo;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $logoFile = $request->file('school_logo');
            $filename = time() . '.' . $logoFile->getClientOriginalName();
            $request->school_logo->move($path, $filename);

        }

        $sc->save();

        return redirect('/admin/school/settings')->withSuccess('Settings has been updated successfully..!');

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
