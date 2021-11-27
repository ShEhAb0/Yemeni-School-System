<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonComment;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Term;
use App\Models\Attachment;
use App\Models\TeacherSubject;
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

//    public function getSubjects($id)
//    {
//        $subjects = TeacherSubject::where('teacher_id',Auth::id())->where('level_id',$id)->where('status',1)->with('subject')->get();
////        $subjects = Subject::where('level_id',Auth::user()->level_id)->where('status',1)->get();
//        if ($subjects->count() > 0) {
//            $data = '<option value="" disabled selected>Select the subject</option>';
//            foreach ($subjects as $subject) {
//                $data .= '
//            <option value="' . $subject->subject_id . '">' . $subject->subject->subject_name . '</option>
//            ';
//            }
//            return response($data,200);
//        }
//        return response('',201);
//    }
//
    public function getLessons($grade,$subject)
    {
        $lessons = Lesson::where('teacher_id',Auth::id())->where('subject_id',$subject)->where('level_id',$grade)->paginate(10);
        return view('pages.teacher.lesson-menu.lesson-table',compact('lessons'))->render();
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
        if ($request->has('save_comment')){
            $request->validate([
                'comment' => 'required'
            ]);

            $comment = new LessonComment();
            $comment->lesson_id = $request->lesson_id;
            $comment->user_id = Auth::id();
            $comment->user_type = 1;
            $comment->username = Auth::user()->teacher_name;
            $comment->comment = $request->comment;
            $comment->created_at = Carbon::now('Asia/Riyadh');
            $comment->status = 1;
            $comment->save();

            $notification = new Notification();
            $notification->type = 3;
            $notification->level_id = $request->level;
            $notification->title = "Teacher comment";
            $notification->details = "Your Teacher ($comment->username) submit new comment on the lesson.";
            $notification->url = "/lesson/$request->lesson_id";
            $notification->created_at = Carbon::now('Asia/Riyadh');
            $notification->status = 0;
            $notification->save();

            return redirect('/teacher/lesson/'.$request->lesson_id);
        }
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

        $name = Auth::user()->teacher_name;
        $notification = new Notification();
        $notification->type = 3;
        $notification->level_id = $lesson->level_id;
        $notification->title = "New Lesson";
        $notification->details = "Your Teacher ($name) post new lesson.";
        $notification->url = "/lesson/$lesson->id";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        $notification = new Notification();
        $notification->type = 4;
        $notification->level_id = $lesson->level_id;
        $notification->title = "New Lesson";
        $notification->details = "Teacher ($name) post new lesson.";
        $notification->url = "/parent/lesson/$lesson->id";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        if ($request->file('video') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('video');
            $filename = $lesson->title.time();
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
            $filename = $lesson->title.time().'.'.$lessonFile->getClientOriginalExtension();
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
//        $lessons = Lesson::where('teacher_id',Auth::id())->paginate(10);
//        $terms = Term::all();
//        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();
//        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
//            return $row->take(1);
//        });
////        $grades = TeacherSubject::where('teacher_id',Auth::id())->with('grades',function ($row){
////            return $row->orderBy->take(1);
////        })->get();
////        dd($grades);
///
        $lesson = Lesson::where('id' , $id)->with(['teacher','subjects','video','photo','doc','lessonComments'])->first();
        return view('pages.teacher.lesson-menu.lesson-show',compact('lesson'));

       // $lessons = Lesson::find($id);
        //return view('pages.teacher.lesson-menu.lesson-show' , compact($lessons) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return response($lesson,200);
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
            'title' => 'required',
            'description' => 'required',
            'subject' => 'required',
            'term' => 'required',
            'grade' => 'required',
        ]);

        $lesson = Lesson::find($id);
        $lesson->teacher_id = Auth::id();
        $lesson->title = $request->input('title');
        $lesson->description = $request->input('description');
        $lesson->subject_id = $request->input('subject');
        $lesson->term_id = $request->input('term');
        $lesson->level_id = $request->input('grade');
        $lesson->status = $request->input('status');

        $lesson->save();

        $name = Auth::user()->teacher_name;
        $notification = new Notification();
        $notification->type = 3;
        $notification->level_id = $lesson->level_id;
        $notification->title = "Lesson updated";
        $notification->details = "Your Teacher ($name) update lesson, check it now.";
        $notification->url = "/lesson/$lesson->id";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        if ($request->file('video') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('video');
            $filename = $lesson->title.time().'.'.$lessonFile->getClientOriginalExtension();
            $request->video->move($path, $filename);

            Attachment::where('type',1)->where('type_id',$lesson->id)->where('attachment_type',1)->update(['url'=>$filename]);
        }
        if ($request->file('image') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('image');
            $filename = time() . '.' . $lessonFile->getClientOriginalName();
            $request->image->move($path, $filename);

            Attachment::where('type',1)->where('type_id',$lesson->id)->where('attachment_type',2)->update(['url'=>$filename]);
        }

        if ($request->file('doc') != null) {
            $path = public_path().'/Lessons/'.$lesson->subjectsLessons->subject_name;
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $lessonFile = $request->file('doc');
            $filename = time() . '.' . $lessonFile->getClientOriginalName();
            $request->doc->move($path, $filename);

            Attachment::where('type',1)->where('type_id',$lesson->id)->where('attachment_type',3)->update(['url'=>$filename]);
        }
        return redirect('/teacher/lesson')->withSuccess('Lesson has been updated successfully..!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect('/teacher/lesson')->withSuccess('Lesson has been deleted successfully..!');

    }
}
