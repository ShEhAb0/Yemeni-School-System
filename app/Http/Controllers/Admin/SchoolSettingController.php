<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class SchoolSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_setting = SchoolSetting::all();

        return view('pages.admin.school-setting-menu.school-setting-index' , compact('school_setting'))->with('school_settings' , $school_setting);

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
            'school_name' => 'required',
            'school_phone' => 'required',
            'school_email' => 'required',
            'school_address' => 'required',
            'academic_year' =>'required',
            'first_term_begin' => 'required',
            'first_term_end' => 'required',
            'second_term_begin' => 'required',
            'second_term_end' => 'required',
            'school_logo' => 'required|mimes:jpg,png,jpeg',
        ]);
        $input = $request->all();


        if ($school_logo = $request->file('school_logo')) {

            $destinationPath =('images/school_logo/');
            $logoImage =  $school_logo->getClientOriginalName();
            $school_logo->move(public_path($destinationPath) , $logoImage );
            $input['school_logo'] = "$logoImage";
        }

        SchoolSetting::create($input);
        return view('pages.admin.school-setting-menu.school-setting-index');

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
        $input = SchoolSetting::findOrFail($request->id);
        if($request->hasFile('school_logo')) {
            $school_logo = $request->file('school_logo');
            $filename = $school_logo->getClientOriginalName();
            $school_logo->move(public_path('images/school_logo'), $filename);
            $input->school_logo = $request->file('$school_logo')->getClientOriginalName();
        }
        $input->update($request->all());

        return  redirect('/admin/school/settings');
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
