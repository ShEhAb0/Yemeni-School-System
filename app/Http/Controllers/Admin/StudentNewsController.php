<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\AdminLog;
use App\Models\Notification;
use App\Models\StudentNews;
use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = StudentNews::with(['grade','term'])->paginate(10);
        $terms = Term::all();
        $grades = Grade::all();
        return view('pages.admin.student-news-menu.student-news-index',compact('news','terms','grades'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $news = StudentNews::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orderBy('id','DESC')->paginate(10);
        $terms = Term::all();
        $grades = Grade::all();
        return view('pages.admin.student-news-menu.student-news-index',compact('news','terms','grades'));

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
            'term' => 'required',
            'grade' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);

        $news = new StudentNews();
        $news->title = $request->input('title');
        $news->description = $request->input('details');
        $news->level_id = $request->input('grade');
        $news->term_id = $request->input('term');
        $news->status = $request->input('status');
        $news->save();

        $notification = new Notification();
        $notification->type = 3;
        $notification->level_id = $news->level_id;
        $notification->title = "Admin add new grade news";
        $notification->details = $news->description;
        $notification->url = "/grade-news";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();

        $notification = new Notification();
        $notification->type = 4;
        $notification->level_id = $news->level_id;
        $notification->title = "Admin add new grade news";
        $notification->details = $news->description;
        $notification->url = "/parent/grade-news";
        $notification->created_at = Carbon::now('Asia/Riyadh');
        $notification->status = 0;
        $notification->save();


        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Grade_News";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new grade news ($news->title).";
        $log->action_name = $news->title;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/grade-news')->withSuccess('Grade News Published successfully.');
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
        $findNews = StudentNews::find($id);
//        return response(['select'=>$select, 'data'=>$findNews],200);
        return response($findNews,200);
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
            'term' => 'required',
            'grade' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);

        $news = StudentNews::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Grade_News";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update grade news ($news->title).";
        $log->action_name = $news->title;
        $log->created_at = now();
        $log->save();

        $news->title =  $request->input('title');
        $news->description =  $request->input('details');
        $news->level_id =  $request->input('grade');
        $news->term_id =  $request->input('term');
        $news->status =  $request->input('status');
        $news->save();

        return redirect('/admin/grade-news')->withSuccess('Grade News updated successfully.');
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
        $news = StudentNews::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Grade_News";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete grade news ($news->title).";
        $log->action_name = $news->title;
        $log->created_at = now();
        $log->save();

        $news->delete();
        return  redirect('/admin/grade-news')->withSuccess('Grade News deleted successfully.');
    }
}
