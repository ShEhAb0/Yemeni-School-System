<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use App\Models\Grade;
use App\Models\News;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $students = User::all()->count();
        $teachers = Teacher::all()->count();
        $grades = Grade::all()->count();
        $news = News::where('status',1)->get();
        return view('pages.admin.index' ,compact('students', 'teachers', 'grades' , 'news'));
    }
}
