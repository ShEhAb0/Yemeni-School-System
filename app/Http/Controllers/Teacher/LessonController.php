<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Lesson;
use App\Models\TeacherSubject;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::where('teacher_id',Auth::id())->paginate(10);
        $terms = Term::all();
        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();
        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
             return $row->take(1);
        });
//        $grades = TeacherSubject::where('teacher_id',Auth::id())->with('grades',function ($row){
//            return $row->orderBy->take(1);
//        })->get();
//        dd($grades);
        return view('pages.teacher.lesson-menu.lesson-index',compact('lessons','terms','teacher_sub','grades'));

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
        $request->validate([
           'title' => 'required',
           'details' => 'required',
           'subject' => 'required',
           'term' => 'required',
           'grade' => 'required',
        ]);

        $lesson = new Lesson();
        $lesson->teacher_id = Auth::id();
        $lesson->title = $request->input('title');
        $lesson->description = $request->input('details');
        $lesson->subject_id = $request->input('subject');
        $lesson->term_id = $request->input('term');
        $lesson->level_id = $request->input('grade');
        $lesson->status = $request->input('status');
        $lesson->save();

        if ($request->file('video') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('video');
            $filename = time() . '.' . $lessonFile->getClientOriginalName();
            $request->video->move($path, $filename);

            $attachment = new Attachment();
            $attachment->type = 1;
            $attachment->type_id = $lesson->id;
            $attachment->attachment_type = 1; // 1 => type video
            $attachment->url = $filename;
            $attachment->save();
        }

        if ($request->file('image') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('image');
            $filename = time() . '.' . $lessonFile->getClientOriginalName();
            $request->image->move($path, $filename);

            $attachment = new Attachment();
            $attachment->type = 1;
            $attachment->type_id = $lesson->id;
            $attachment->attachment_type = 2; // 1 => type image
            $attachment->url = $filename;
            $attachment->save();
        }

        if ($request->file('doc') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('doc');
            $filename = time() . '.' . $lessonFile->getClientOriginalName();
            $request->doc->move($path, $filename);

            $attachment = new Attachment();
            $attachment->type = 1;
            $attachment->type_id = $lesson->id;
            $attachment->attachment_type = 3; // 1 => type document
            $attachment->url = $filename;
            $attachment->save();
        }

        return redirect('/teacher/lesson')->withSuccess('New lesson has been added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.teacher.lesson-menu.lesson-show');

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
