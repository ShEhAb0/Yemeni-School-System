<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\UserParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('type' , 3 )->get();
        $student_id = session('student_id');
        if($student_id) {
            //
//            $parents_us = UserParent::where('parent_id', Auth::id())->with('user')->get();
            return view('pages.parent.index' , compact('news'));
        }else{
            return redirect('/parent/choose-student');
        }
    }

    public function chooseStudent(Request $request){
        $request->validate([
            'student'=> 'required'
        ]);
        $student = User::find($request->student);
        session()->put('student_id',$student->id);
        session()->put('student_name',$student->student_name);
        session()->put('student_username',$student->username);
        session()->put('student_image',$student->image);
        session()->put('student_level',$student->level_id);
        session()->put('student_term',$student->term_id);
        return redirect('/parent/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (session('student_id')) {
            session()->remove('student_id');
            session()->remove('student_name');
            session()->remove('student_username');
            session()->remove('student_image');
            session()->remove('student_level');
            session()->remove('student_term');
            $parents_us = UserParent::where('parent_id', Auth::id())->with('user')->get();
            return view('pages.parent.selectStudent', compact('parents_us'));
        }else{
            $parents_us = UserParent::where('parent_id', Auth::id())->with('user')->get();
            return view('pages.parent.selectStudent', compact('parents_us'));
        }
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
        //
        $parents_us = UserParent::where('id' , $id)->first();
        return view('pages.parent.show' , compact('parents_us'));
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
