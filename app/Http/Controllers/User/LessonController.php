<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonComment;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::where('level_id',Auth::user()->level_id)->get();
        $lessons = Lesson::where('id',0)->paginate(3);
        return view('pages.user.lesson-menu.lesson-index',compact('subjects','lessons'));
    }

//    public function search(Request $request)
//    {
//        $search = $request->input('search');
//
//        // Search in the title and body columns from the posts table
//        $lessons = Lesson::query()
//            ->where('subject_id', Auth::id())
//            ->where('title', 'LIKE', "%{$search}%")
//            ->orWhere('description', 'LIKE', "%{$search}%")
//            ->paginate(10);
//        $terms = Term::all();
//        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();
//        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
//            return $row->take(1);
//        });
//        return view('pages.user.lesson-menu.lesson-index',compact('lessons','terms','teacher_sub','grades'));
//
//    }

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
           'comment' => 'required'
        ]);

        $comment = new LessonComment();
        $comment->lesson_id = $request->lesson_id;
        $comment->user_id = Auth::id();
        $comment->user_type = 0;
        $comment->username = Auth::user()->student_name;
        $comment->comment = $request->comment;
        $comment->created_at = Carbon::now('Asia/Riyadh');
        $comment->status = 1;
        $comment->save();

        $name= Auth::user()->student_name;
        $notification = new Notification();
        $notification->type = 2;
        $notification->title = "Student comment";
        $notification->details = "Student ($name) submit new comment on the lesson.";
        $notification->url = "/teacher/lesson/$request->lesson_id";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        if (!$comment->user_id == Auth::id()) {
            $notification = new Notification();
            $notification->type = 3;
            $notification->level_id = $request->level;
            $notification->title = "Student comment";
            $notification->details = "Student ($name) submit new comment on the lesson.";
            $notification->url = "/lesson/$request->lesson_id";
            $notification->created_at = Carbon::now('Asia/Riyadh');
            $notification->status = 0;
            $notification->save();
        }

        return redirect('/lesson/'.$request->lesson_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::where('id',$id)->with(['teacher','subjects','video','photo','doc','lessonComments'])->first();

        return view('pages.user.lesson-menu.lesson-show',compact('lesson'));
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
        $lessons = Lesson::where('subject_id',$id)->where('level_id',Auth::user()->level_id)->where('term_id',Auth::user()->term_id)->where('status',0)->with('teacher')->paginate(3);
        return view('pages.user.lesson-menu.lesson-data',compact('lessons'));
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
