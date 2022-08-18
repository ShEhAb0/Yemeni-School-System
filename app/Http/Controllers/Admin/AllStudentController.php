<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class AllStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::all();
        $grades = Grade::all();
        $marks = Mark::where('id',0);
        return view('pages.admin.upgrade-menu.upgrade-index',compact('terms','grades','marks'));

    }

    public function showStudents($term, $grade)
    {
        $marks = Mark::where('term_id',$term)->where('level_id',$grade)->where('status',0)->with('student')->get()
            ->groupBy('student_id');

        return view('pages.admin.upgrade-menu.upgrade-table',compact('marks'));

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
        $marks = Mark::where('term_id',$request->term)->where('level_id',$request->grade)
            ->where('total','>=',$request->total)->where('status',0)->get()->groupBy('student_id');
        $i=0;
        foreach ($marks as $mark) {
            if ($mark->count() >= $request->subject) {
                Mark::where('term_id',$request->term)->where('level_id',$request->grade)
                    ->where('student_id',$mark[$i]->student_id)->where('status',0)->update(['status'=>1]);
                if ($request->term == 1){
                    User::where('id',$mark[$i]->student_id)->update(['term_id'=>2]);
                }else{
                    $user = User::find($mark[$i]->student_id);
                    $user->level_id += 1;
                    $user->term_id = 1;
                    $user->save();
                }
            }
        }

        return redirect('/admin/all-students');
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
