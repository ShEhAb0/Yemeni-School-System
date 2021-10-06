<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'username' => 'required|string|exists:admins,username',
            'password' => 'required|min:5|max:30',

        ], [
            'username.exists' => 'This username is not exists on admins table',


        ]);

        $creds = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($creds)) {

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
