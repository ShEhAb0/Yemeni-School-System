<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SuperAdminController extends Controller
{
    public function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'username' => 'required|string|exists:admins,username',
            'password' => 'required|min:5|max:30',

        ], [
            'username.exists' => 'This username is not exists on users table',


        ]);


        $creds = $request->only('username', 'password');
        if (Auth::guard('superAdmin')->attempt($creds)) {


            return redirect()->route('superAdmin.index');
        } else {
            return redirect()->route('superAdmin.login')->with('fail', 'Incorrect credentials');
        }

    }
    public function logout()
    {
        Auth::guard('superAdmin')->logout();
        return redirect('/superAdmin/index');
    }
}
