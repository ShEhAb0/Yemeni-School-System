
@extends('pages.parent.layouts.parent-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Today Works</h6>
@endsection
@section('content')

    <div class="container-fluid pt-5">
        <div class="d-flex justify-content-around"  id="lessonmain">


            <div class="card mb-2 col-12  col-sm-12  col-md-12 col-lg-8 col-xl-8 col-xxl-8" style="overflow: hidden;">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="d-flex align-items-center" >
                            <h6 class="mb-0 purplel-color mb-3">Today lessons</h6>
                        </div>
                    </div>
                </div>
                @if($lessons->count() > 0)

                    <div class="p-3 d-flex justify-content-around max-height-vh-100 mb-2" id="lessonmain"  style="flex-wrap: wrap;overflow-y: auto;background-color: #f4f5f6;">
                        @foreach($lessons as $lesson)
                            <div class="card card-body m-2" style="width:45%;" id="cols" >
                                <div class="p-2">

                                    <h5 class="card-title">{{$lesson->title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$lesson->teacher->teacher_name}}</h6>
                                    <p class="text-sm">Upload Date: {{$lesson->created_at}}</p>
                                    <p class="card-text">{{$lesson->description}}</p>
                                    <a class="btn btn-primary w-100 btn-sm mb-0" href="/parent/lesson/{{$lesson->id}}">Go To Lesson</a>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <br/>
                @else
                    <div class="text-center text-danger py-3">
                        There are no lessons for today ..!
                    </div>
                @endif
            </div>

            <div class="card col-12  col-sm-12  col-md-12 col-lg-4 col-xl-4 col-xxl-4  ms-2 mb-2">
                <div class="card-header pb-0 p-3">
                    <h6 class="purplel-color mb-1">Assignments DeadLine</h6>
                </div>
                @if($assignments->count() > 0)

                    @foreach($assignments as $a)
                        <div class="max-height-vh-100 p-3" style="overflow-y: auto;background-color: #f4f5f6;">

                            <div class="list-group mb-2">
                                <div href="/user/assignment/{{$a->id}}" class="list-group-item">
                                    <div class="block py-1">
                                        <div class="text-bold mb-1 text-dark ">{{$a->title}}</div>
                                        <span class="text-dark text-sm">DeadLine: {{date('Y-m-d' , strtotime($a->due_date))}}</span>


                                    </div>
                                    <div class="d-flex justify-content-between py-1">
                                        <span class="text-bold ">{{$a->subjects->subject_name }} </span>

                                        <div >
                                            <span class="text-dark text-sm">{{$a->teacher->teacher_name}}</span>

                                        </div>
                                    </div>
                                    <a class="btn btn-primary w-100 btn-sm mb-0 mt-2" href="/parent/assignment/{{$a->id}}">View</a>
                                </div>

                            </div>

                        </div>
                    @endforeach
            </div>
            @else
                <div class="text-sm-center text-danger py-3">
                    There are no assignments for today ..!
                </div>
            @endif

        </div>

    </div>

@endsection
