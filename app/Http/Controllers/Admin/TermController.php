<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Term;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms = Term::paginate(10);
        return view('pages.admin.term-menu.term-index',compact('terms'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $terms = Term::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy('id','DESC')->paginate(10);


        //$search = $request->get('search');
        return view('pages.admin.term-menu.term-index',compact('terms'));

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
            'term_name' => 'required'
        ]);

        $term = new Term();
        $term->name = $request->input('term_name');
        $term->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Term";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new term ($term->name).";
        $log->action_name = $term->name;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/terms')->withSuccess('New term has been added successfully..');
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
        $term = Term::find($id);
        return response($term,200);
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
            'term_name' => 'required'
        ]);

        $term = Term::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Term";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update term ($term->name) to ($request->term_name).";
        $log->action_name = $request->term_name;
        $log->created_at = now();
        $log->save();

        $term->name = $request->term_name;
        $term->save();



        return redirect('/admin/terms')->withSuccess('Term has been updated successfully..');
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
        $term = Term::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Term";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete term ($term->name).";
        $log->action_name = $term->name;
        $log->created_at = now();
        $log->save();

        $term->delete();

        return redirect('/admin/terms')->withSuccess('Term has been deleted successfully..');
    }
}
