<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::paginate(10);

        return view('pages.admin.admin-menu.admin-index', compact('admins'));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $admins = Admin::query()
            ->where('admin_name', 'LIKE', "%{$search}%")
            ->orWhere('username', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('gender', 'LIKE', "%{$search}%")
            ->orWhere('type', 'LIKE', "%{$search}%")
            ->orderBy('id','DESC')->paginate(10);
        return view('pages.admin.admin-menu.admin-index',compact('admins'));

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
            'fullname' => 'required|max:50',
            'username' => 'required|unique:admins,username|min:3',
            'email' => 'required|unique:admins,email',
            'gender' => 'required',
            'type' => 'required',
            'status' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $admin = new Admin();
        $admin->admin_name = $request->input('fullname');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->gender = $request->input('gender');
        $admin->image = 'default.jpg';
        $admin->type = $request->input('type');
        $admin->status = $request->input('status');
        $admin->save();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Admin";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new admin ($admin->admin_name '$admin->username').";
        $log->action_name = $admin->admin_name. " $admin->username";
        $log->created_at = now();
        $log->save();

        return redirect('/admin/admins')->withSuccess('New admin has been added successfully..');
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
        $admin = Admin::find($id);
        return response($admin,200);
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
            'fullname' => 'required|max:50',
            'username' => "required|unique:admins,username,$id|min:3",
            'email' => "required|unique:admins,email,$id",
            'gender' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        if ($request->input('password') != null){
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);
        }

        $admin = Admin::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Admin";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update admin ($admin->admin_name '$admin->username').";
        $log->action_name = $admin->admin_name. " $admin->username";
        $log->created_at = now();
        $log->save();

        $admin->admin_name = $request->input('fullname');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        if ($request->input('password') != null) {
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->gender = $request->input('gender');
        $admin->type = $request->input('type');
        $admin->status = $request->input('status');
        $admin->save();

        return redirect('/admin/admins')->withSuccess('Admin has been updated successfully..');

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
        $admin = Admin::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Admin";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete admin ($admin->admin_name '$admin->username').";
        $log->action_name = $admin->admin_name. " $admin->username";
        $log->created_at = now();
        $log->save();

        $admin->delete();

        return redirect('/admin/admins')->withSuccess('Admin has been deleted successfully..');

    }
}
