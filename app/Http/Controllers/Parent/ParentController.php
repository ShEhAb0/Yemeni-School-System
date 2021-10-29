<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function index()
    {

        //$parents_us = UserParent::where('parent_id',Auth::id())->with('user')->get();
       // $parents_us = UserParent::with('user');
        $parents_us = UserParent::where('parent_id',Auth::id())->with('user')->get();
        //$user = User::all();


        return view('pages.parent.index' , compact('parents_us'));
    }

    public function show($id)
    {
        $parents_us = UserParent::where('id' , $id)->first();
        return view('pages.parent.show' , compact('parents_us'));

    }
}
