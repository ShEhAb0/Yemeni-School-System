<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\StudentAssignment;
use App\Models\TeacherSubject;
use App\Models\Term;
use Carbon\Carbon;
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
        $assignments = Assignment::where('teacher_id',Auth::id())->paginate(10);
        $terms = Term::all();
        $teacher_sub = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('subject')->get();
        $grades = TeacherSubject::where('teacher_id',Auth::id())->where('status',1)->with('grade')->get()->groupBy('level_id')->map(function ($row){
            return $row->take(1);
        });
        return view('pages.teacher.assignment-menu.assignment-index',compact('assignments','terms','teacher_sub','grades'));

    }

    public function getSubjects($id)
    {
        $subjects = TeacherSubject::where('teacher_id',Auth::id())->where('level_id',$id)->where('status',1)->with('subject')->get();
//        $subjects = Subject::where('level_id',Auth::user()->level_id)->where('status',1)->get();
        if ($subjects->count() > 0) {
            $data = '<option value="" disabled selected>Select the subject</option>';
            foreach ($subjects as $subject) {
                $data .= '
            <option value="' . $subject->subject_id . '">' . $subject->subject->subject_name . '</option>
            ';
            }
            return response($data,200);
        }
        return response('',201);
    }

    public function getAssignments($grade,$subject)
    {
        $assignments = Assignment::where('teacher_id',Auth::id())->where('subject_id',$subject)->where('level_id',$grade)->paginate(10);
        return view('pages.teacher.assignment-menu.assignment-table',compact('assignments'))->render();
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
           'description' => 'required',
           'term' => 'required',
           'subject' => 'required',
           'grade' => 'required',
           'file' => 'required',
           'status' => 'required',
        ]);

        $assignmentFile = $request->file('file');
        $filename = time() . '.' . $assignmentFile->getClientOriginalName();

        $assignment = new Assignment();
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->file_name = $filename;
        $assignment->teacher_id = Auth::id();
        $assignment->subject_id = $request->input('subject');
        $assignment->level_id = $request->input('grade');
        $assignment->term_id = $request->input('term');
        $assignment->due_date = $request->input('date');
        $assignment->status = $request->input('status');
        $assignment->save();

        $name = Auth::user()->teacher_name;
        $notification = new Notification();
        $notification->type = 3;
        $notification->level_id = $assignment->level_id;
        $notification->title = "New Assignment";
        $notification->details = "Your Teacher ($name) post new assignment, check it now.";
        $notification->url = "/assignment/$assignment->id";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        $notification = new Notification();
        $notification->type = 4;
        $notification->level_id = $assignment->level_id;
        $notification->title = "New Assignment";
        $notification->details = "Teacher ($name) post new assignment, check it now.";
        $notification->url = "/parent/assignment/$assignment->id";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        $path = public_path().'/Assignments/'.$assignment->subjectsAssignments->subject_name;
        if (!File::exists($path)){
            File::makeDirectory($path);
        }
        $request->file('file')->move($path, $filename);

        return redirect('/teacher/assignment')->withSuccess('New assignment has been added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::where('id' , $id)->first();
        $answers = StudentAssignment::where('assignment_id',$id)->where('status',0)->with('student')->get();
        return view('pages.teacher.assignment-menu.assignment-show' , compact('assignment','answers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::find($id);
        return response($assignment,200);
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
        if ($request->has('marks')){
            $request->validate([
                'mark' => 'required',
            ]);
            $answer = StudentAssignment::find($id);
            $answer->mark = $request->mark;
            $answer->status = 1;
            $answer->save();
            return redirect('/teacher/assignment/'.$answer->assignment_id);
        }
        else {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'term' => 'required',
                'subject' => 'required',
                'date' => 'required',
                'grade' => 'required',
                'status' => 'required',
            ]);

            $assignment = Assignment::find($id);
            $assignment->title = $request->input('title');
            $assignment->description = $request->input('description');
            if ($request->file('file') != null) {
                $path = public_path() . '/Assignments/' . $assignment->subjectsAssignments->subject_name;
                $assignmentFile = $request->file('file');
                $filename = time() . '.' . $assignmentFile->getClientOriginalName();
                $request->file('file')->move($path, $filename);
                $assignment->file_name = $filename;
            }
            $assignment->teacher_id = Auth::id();
            $assignment->subject_id = $request->input('subject');
            $assignment->level_id = $request->input('grade');
            $assignment->term_id = $request->input('term');
            $assignment->due_date = $request->input('date');
            $assignment->status = $request->input('status');
            $assignment->save();

            return redirect('/teacher/assignment')->withSuccess('Assignment has been updated successfully..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();

        return redirect('/teacher/assignment')->withSuccess('Assignment has been deleted successfully..!');

    }
}
