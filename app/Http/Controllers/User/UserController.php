<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\News;
use App\Models\StudentNews;
use App\Models\Subject;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $terms = User::with('term')->get();
        //$terms = Term::all();
        $subjects = Subject::where('level_id',Auth::user()->level_id)->get();
        $assignments = Assignment::where('level_id',Auth::user()->level_id)->where('status',1)->orderBy('created_at','desc')->with('teacher' , 'subjects' )->get();
        $news = News::whereIn('type',[0,3])->where('status',1)->orderBy('created_at','desc')->get();
        $student_news = StudentNews::where('level_id',Auth::user()->level_id)->where('status',1)->orderBy('created_at','desc')->get();
        return view('pages.user.index' ,compact('subjects','assignments' , 'terms' , 'news' , 'student_news'));
    }
}
