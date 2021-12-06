<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\Parents;
use App\Models\User;
use App\Models\UserParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = Parents::with('students' )->get();
        $users = User::all();
        return view('pages.admin.parent-menu.parent-index' , compact('users','parents'));

    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::all();
        $parents = Parents::query()
            ->where('parent_name', 'LIKE', "%{$search}%")
            ->orWhere('username', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('gender', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->orderBy('id','DESC')->paginate(10);
        return view('pages.admin.parent-menu.parent-index',compact('parents' , 'users'));
    }

    public function getStudents()
    {
        $students = User::pluck('student_name');
        return view('pages.admin.parent-menu.parent-index' , compact('students'));
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
        $request->validate([
            'parent_name' => 'required|max:50',
            'username' => 'required|unique:parents,username|min:3',
            'email' => 'required|unique:parents,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'numeric',
            'parent_id_or_passport' => 'required',
            'user' => 'required',
            'status' => 'required',
        ]);


        $parent = new Parents();
        $parent->parent_name = $request->input('parent_name');
        $parent->username = $request->input('username');
        $parent->email = $request->input('email');
        $parent->password = Hash::make($request->input('password'));
        $parent->gender = $request->input('gender');
        $parent->address = $request->input('address');
        $parent->phone = $request->input('phone');

        $parent->parent_id_or_passport = $request->input('parent_id_or_passport');
        $parent_id_or_passport = $request->file('parent_id_or_passport');
        $filename = time().'.'.$parent_id_or_passport->getClientOriginalExtension();
        $request->parent_id_or_passport->move(public_path('images/parents_IDs') , $filename);
        $parent->parent_id_or_passport=$filename;

        $parent->status = $request->input('status');
        $parent->save();

        foreach ($request->input('user') as $user) {
            DB::table('users_parents')->insert(['parent_id' => $parent->id, 'user_id' => $user]);
        }

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Add_Parent";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") add new parent ($parent->parent_name).";
        $log->action_name = $parent->parent_name;
        $log->created_at = now();
        $log->save();

        return redirect('/admin/parents')->withSuccess('New parent has been added successfully..!');


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
        $parent = Parents::find($id);
        $students = $parent->students;
        return response(['parent'=>$parent,'students'=>$students],200);
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
            'parent_name' => 'required|max:50',
            'username' => 'min:3|required|unique:parents,username,'.$id,
            'email' => 'required|unique:parents,email,'.$id,
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'numeric',
            //'parent_id_or_passport' => 'required',
            'user' => 'required',
            'status' => 'required',
        ]);

        $parent = Parents::find($id);

        DB::table('users_parents')->where('parent_id',$id)->delete();

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Update_Parent";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") update parent ($parent->parent_name) to ($request->parent_name).";
        $log->action_name = $request->parent_name;
        $log->created_at = now();
        $log->save();


        $parent->parent_name = $request->input('parent_name');
        $parent->username = $request->input('username');
        $parent->email = $request->input('email');
        $parent->password = Hash::make($request->input('password'));
        $parent->gender = $request->input('gender');
        $parent->address = $request->input('address');
        $parent->phone = $request->input('phone');

//        $parent->parent_id_or_passport = $request->input('parent_id_or_passport');
//        $parent_id_or_passport = $request->file('parent_id_or_passport');
//        $filename = time().'.'.$parent_id_or_passport->getClientOriginalExtension();
//        $request->parent_id_or_passport->move(public_path('images/parents_IDs') , $filename);
//        $parent->parent_id_or_passport=$filename;

        $parent->status = $request->input('status');
        $parent->save();

        foreach ($request->input('user') as $user) {
            DB::table('users_parents')->insert(['parent_id' => $parent->id, 'user_id' => $user]);
        }
        return redirect('/admin/parents')->withSuccess('Parent has been updated successfully..!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Parents::find($id);

        $log = new AdminLog();
        $log->admin_id = Auth::id();
        $log->action = "Delete_Parent";
        $log->detils = "Admin (". Auth::guard('admin')->user()->admin_name.") delete parent ($parent->parent_name).";
        $log->action_name = $parent->parent_name;
        $log->created_at = now();
        $log->save();

        $parent->delete();
        return redirect('/admin/parents')->withSuccess('Parent has been deleted successfully..!');

    }
}
