<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
