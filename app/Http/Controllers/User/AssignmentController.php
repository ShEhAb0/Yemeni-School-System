<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentComment;
use App\Models\Notification;
use App\Models\StudentAssignment;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::where('level_id',Auth::user()->level_id)->get();
        $assignments = Assignment::where('id',0)->paginate(3);
        return view('pages.user.assignment-menu.assignment-index',compact('subjects','assignments'));

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
        if ($request->has('saveAnswer')){
            $subject = Subject::where('id',$request->subject_id)->first();
            $path = public_path().'/Assignments/'.$subject->subject_name.'/Answers';
            if (!File::exists($path)){
                File::makeDirectory($path);
            }
            $answerFile = $request->file('answer');
            $filename = time() . '.' . $answerFile->getClientOriginalName();
            $request->file('answer')->move($path, $filename);

            $answer = new StudentAssignment();
            $answer->subject_id = $request->subject_id;
            $answer->assignment_id = $request->as_id;
            $answer->student_id = Auth::id();
            $answer->file_name = $filename;
            $answer->delivery_date = Carbon::now('Asia/Riyadh');
            $answer->mark = 0;
            $answer->status = 0;//($request->due >= Carbon::today('Asia/Riyadh')->format('Y-m-d') ? 1 : 0);
            $answer->save();

            $name= Auth::user()->student_name;
            $notification = new Notification();
            $notification->type = 2;
            $notification->title = "Student submit assignment";
            $notification->details = "Student ($name) submit ($subject->subject_name's) assignment.";
            $notification->url = "/teacher/assignment/$answer->assignment_id";
            $notification->created_at = Carbon::now('Asia/Riyadh');
            $notification->status = 0;
            $notification->save();

            return redirect('/assignment/'.$answer->assignment_id)->withSuccess('Your answer has been uploaded successfully..');

        }else{
            $request->validate([
                'comment' => 'required'
            ]);

            $comment = new AssignmentComment();
            $comment->assignment_id = $request->assignment_id;
            $comment->user_id = Auth::id();
            $comment->user_type = 0;
            $comment->username = Auth::user()->student_name;
            $comment->comment = $request->comment;
            $comment->created_at = Carbon::now('Asia/Riyadh');
            $comment->status = 1;
            $comment->save();

            return redirect('/assignment/'.$request->assignment_id);
        }




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
        $assignment = Assignment::where('id',$id)->with(['teacher','subjects','answer' , 'assignmentComments'])->first();
        return view('pages.user.assignment-menu.assignment-show' ,compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignments = Assignment::where('subject_id',$id)->where('level_id',Auth::user()->level_id)->with('teacher')->paginate(3);
        return view('pages.user.assignment-menu.assignment-data',compact('assignments'));

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
