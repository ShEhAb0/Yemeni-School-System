<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class TeacherLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('pages.teacher.login');
    }
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('teacher')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('teacher.index'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}
