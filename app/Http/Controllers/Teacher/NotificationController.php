<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        Notification::where('type',2)->where('status',0)->update(['status'=>1]);
        $notifications = Notification::where('type',2)->orderBy('created_at','desc')->paginate(10);
        return view('',compact($notifications));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $note = '';
        $notifications = Notification::where('type',2)->where('status',0)->orderBy('created_at','desc')->take(3)->get();
        $count = Notification::where('type',2)->where('status',0)->count();

        if ($count > 0){
            foreach ($notifications as $notification){
                $note .= '
                <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="/teacher/notifications/'.$notification->id.'">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="'.asset('/img/logo-ct.png').'" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">'.$notification->title.'</span>
                                        </h6>
                                        <p class="text-secondary mb-0 text-truncate">
                                        '.$notification->details.'
                                        </p>
                                        <p class="text-xs text-secondary mb-0 text-truncate">
                                        <i class="fa fa-clock me-1"></i>
                                            '.Carbon::parse($notification->created_at,"Asia/Riyadh")->diffForHumans().'
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                ';
            }
            $note .= '<hr><div class="text-center"><a href="/teacher/notifications">Show all</a></div>';
        }else
            $note = '<div class="text-center"><p>No notifications</p></div> <hr><div class="text-center"><a href="/teacher/notifications">Show all</a></div>';

        if ($count > 99){
            $count = "99+";
        }
        return response(['nots'=>$note,'count'=>$count]);
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
        $noti = Notification::find($id);
        $noti->status = 1;
        $noti->save();

        return redirect($noti->url);
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
    }
}
