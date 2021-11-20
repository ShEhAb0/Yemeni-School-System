<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;
use Route;

class ParentLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:parent', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('pages.parent.login');
    }
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('parent')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('parent.index.index'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::guard('parent')->logout();
        session()->remove('student_id');
        session()->remove('student_name');
        session()->remove('student_username');
        session()->remove('student_image');
        session()->remove('student_level');
        session()->remove('student_term');
        return redirect('/');
    }
}
