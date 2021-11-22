<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\News;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::guard('admin')->user()->type == 0){
            $news = News::paginate(10);
        }else{
            $news = News::where('type','!=',1)->paginate(10);
        }
        return view('pages.admin.news-menu.news-index',compact('news'));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $news = News::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();


        //$search = $request->get('search');
       // $news = DB::table('news')->where('title' , 'like' , '%'.$search.'%')->paginate(10);
        return view('pages.admin.news-menu.news-index',compact('news'));

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
            'type' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->description = $request->input('details');
        $news->type = $request->input('type');
        $news->status = $request->input('status');
        $news->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_News";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new news ($news->title).";
        $log->action_name = $news->title;
        $log->created_at = now();
        $log->save();

        switch ($request->input('type')) {
            case 0:
                    $notification = new Notification();
                    $notification->type = 1;
                    $notification->title = "Admin add new news";
                    $notification->details = $news->description;
                    $notification->url = "/admin/news";
                    $notification->created_at = Carbon::now('Asia/Riyadh');
                    $notification->status = 0;
                    $notification->save();

                    $notification = new Notification();
                    $notification->type = 2;
                    $notification->title = "Admin add new news";
                    $notification->details = $news->description;
                    $notification->url = "/teacher/news";
                    $notification->created_at = Carbon::now('Asia/Riyadh');
                    $notification->status = 0;
                    $notification->save();

                    $notification = new Notification();
                    $notification->type = 3;
                    $notification->level_id = 0;
                    $notification->title = "Admin add new news";
                    $notification->details = $news->description;
                    $notification->url = "/news";
                    $notification->created_at = Carbon::now('Asia/Riyadh');
                    $notification->status = 0;
                    $notification->save();

                    $notification = new Notification();
                    $notification->type = 4;
                    $notification->level_id = 00;
                    $notification->title = "Admin add new news";
                    $notification->details = $news->description;
                    $notification->url = "/parent/news";
                    $notification->created_at = Carbon::now('Asia/Riyadh');
                    $notification->status = 0;
                    $notification->save();
                break;
            case 1:
                $notification = new Notification();
                $notification->type = 1;
                $notification->title = "Super Admin add new news";
                $notification->details = $news->description;
                $notification->url = "/admin/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 2:
                $notification = new Notification();
                $notification->type = 2;
                $notification->title = "Admin add new teacher news";
                $notification->details = $news->description;
                $notification->url = "/teacher/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 3:
                $notification = new Notification();
                $notification->type = 3;
                $notification->level_id = 0;
                $notification->title = "Admin add new news";
                $notification->details = $news->description;
                $notification->url = "/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();

                $notification = new Notification();
                $notification->type = 4;
                $notification->level_id = 00;
                $notification->title = "Admin add new student news";
                $notification->details = $news->description;
                $notification->url = "/parent/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 4:
                $notification = new Notification();
                $notification->type = 4;
                $notification->level_id = 00;
                $notification->title = "Admin add new parent news";
                $notification->details = $news->description;
                $notification->url = "/parent/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
        }

        return redirect('/admin/news')->withSuccess('News Published successfully.');
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
        $findNews = News::find($id);
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
            'type' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);

        $news = News::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_News";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update news ($news->title).";
        $log->action_name = $news->title;
        $log->created_at = now();
        $log->save();

        $news->title =  $request->input('title');
        $news->description =  $request->input('details');
        $news->type =  $request->input('type');
        $news->status =  $request->input('status');
        $news->save();

        switch ($request->input('type')) {
            case 0:
                $notification = new Notification();
                $notification->type = 1;
                $notification->title = "Admin update news";
                $notification->details = $news->description;
                $notification->url = "/admin/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();

                $notification = new Notification();
                $notification->type = 2;
                $notification->title = "Admin update news";
                $notification->details = $news->description;
                $notification->url = "/teacher/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();

                $notification = new Notification();
                $notification->type = 3;
                $notification->title = "Admin update news";
                $notification->details = $news->description;
                $notification->url = "/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();

                $notification = new Notification();
                $notification->type = 4;
                $notification->title = "Admin update news";
                $notification->details = $news->description;
                $notification->url = "/parent/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 1:
                $notification = new Notification();
                $notification->type = 1;
                $notification->title = "Super Admin update news";
                $notification->details = $news->description;
                $notification->url = "/admin/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 2:
                $notification = new Notification();
                $notification->type = 2;
                $notification->title = "Admin update teacher news";
                $notification->details = $news->description;
                $notification->url = "/teacher/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 3:
                $notification = new Notification();
                $notification->type = 3;
                $notification->title = "Admin update news";
                $notification->details = $news->description;
                $notification->url = "/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();

                $notification = new Notification();
                $notification->type = 4;
                $notification->title = "Admin update student news";
                $notification->details = $news->description;
                $notification->url = "/parent/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
            case 4:
                $notification = new Notification();
                $notification->type = 4;
                $notification->title = "Admin update parent news";
                $notification->details = $news->description;
                $notification->url = "/parent/news";
                $notification->created_at = Carbon::now('Asia/Riyadh');
                $notification->status = 0;
                $notification->save();
                break;
        }
        return redirect('/admin/news')->withSuccess('News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_News";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete news ($news->title).";
        $log->action_name = $news->title;
        $log->created_at = now();
        $log->save();

        $news->delete();
        return  redirect()->route('admin.news.index')->withSuccess('News deleted successfully.');

    }
}
