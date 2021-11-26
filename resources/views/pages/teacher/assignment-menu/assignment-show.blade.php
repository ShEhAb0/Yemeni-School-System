<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">

    <title>
        School
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}"/>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />

    <script src="{{asset('/js/jquery-3.3.1.js')}}"></script>

</head>
<body>

<div class="container  z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="./TeacherProfile.html">
                        Courses
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">

                        </ul>
                        <ul  class="navbar-nav  justify-content-end">
                            <li class="nav-item">

                                <a class="d-flex d-flex align-items-center  py-1 cursor-pointer"  href="./TeacherProfile.html">
                                    <img src="{{asset('/img/home-decor-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                                    <div style="margin: auto 10px;">    <span class="d-sm-inline d-none text-dark text-bold">{{ Auth::user()->username}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item  ps-3 d-flex align-items-center ">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="./Message.html" class="nav-link text-body p-0">
                                    <i class="fas fa-envelope cursor-pointer text-dark" ></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center ">
                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer text-dark"></i>
                                </a>

                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="{{asset('/img/team-2.jpg')}}" class="avatar avatar-sm  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">Notify 1</span>details
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="{{asset('/img/team-2.jpg')}}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">Notify 2</span>details
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Notify 3 type without details
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <i class="fas fa-sign-out-alt text-dark me-sm-1"></i>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<div class="container-fluid ">

    <div class="d-flex  w-100 mt-5">
        <!--Lesson Title Section-->

        <div class="w-100  mt-5 mb-3 po_re">
            <div class="text-center ms-10">
                <svg class="white ms-10" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>settings</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(304.000000, 151.000000)">
                                    <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                    </polygon>
                                    <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                    <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="page_shape4"></div>

            <div class="d-flex justify-content-between w-100 mt-1 mb-1">
                <h3 class="white">Assignment Title  {{$assignment->title}}      </h3>
                <span class="white me-9"><i class="fas fa-clock me-2 grey" style="font-size: 15px;"></i><span class="white">DeadLine:  </span><span class="ms-2 text-sm">{{$assignment->due_date}}</span></span>
            </div>
            <div>
                <p class="white"><i class="fas fa-chalkboard-teacher me-2 grey" style="font-size: 15px;"></i>Teacher Name: <span>{{Auth::user()->teacher_name}}</span></p>
                <p class="white"><i class="fas fa-book-open me-2 grey" style="font-size: 15px;"></i>Subject Related: <span>Math (grade {{$assignment->level_id}})</span></p>
                <div class="d-flex justify-content-between w_70">
                    <h4 class="white">Assignment Explanation</h4>
                </div>
                <div class="col-10">
                    <p class="white " style="text-align: justify;" >{{$assignment->description}}</p>



                </div>

            </div>

        </div>
        <!--vedio Section-->
        <div class="me-5 mt-5 mb-3">

            <video
                id="my-video"
                class="video-js"
                controls
                preload="auto"
                width="500"
                height="300"

                data-setup="{}"
            >
                <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4" />
                <source src="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4" type="video/mp4" />
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                    >supports HTML5 video</a
                    >
                </p>
            </video>
            <!--File photo section-->
            <div class="po_re">
                <div class="page_shape1"></div>
                <br/>
                <br/>
                <br/>
                <!-- photo section-->
                <div class="text-end">
                    <svg class="white" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>settings</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(304.000000, 151.000000)">
                                        <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                        </polygon>
                                        <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div mt->
{{--                    <h4 class="white" >Photos </h4>--}}
{{--                    <div class="d-flex justify-content-around">--}}
{{--                        <div>--}}
{{--                            <a href="{{asset('/img/team-2.jpg')}}" download="filename"><img src="{{asset('/img/team-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100"></a>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <a href="{{asset('/img/team-2.jpg')}}" download="filename"><img src="{{asset('/img/team-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100"></a>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <a href="{{asset('/img/team-2.jpg')}}" download="filename"><img src="{{asset('/img/team-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="d-flex justify-content-around mt-2">--}}
{{--                        <div><a href="{{asset('/js/soft-ui-dashboard.js')}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 grey" style="font-size:15px;"></i> </a>       </div>--}}
{{--                        <div> <a href="{{asset('/js/soft-ui-dashboard.js')}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 grey" style="font-size:15px;"></i> </a>         </div>--}}
{{--                        <div>--}}
{{--                            <a href="{{asset('/js/soft-ui-dashboard.js')}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 grey" style="font-size:15px;"></i> </a>       </div>--}}

{{--                    </div>--}}
                    <br/>
                    <!--File section-->
                    <div>
                        <h4 class="white">Files </h4>
                        <div class="d-flex justify-content-around ">
                            <div>
                                <a href="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->file_name)}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 grey" style="font-size:15px;"></i> <span class="white">{{$assignment->file_name}}</span></a>
                            </div>
{{--                            <div>--}}
{{--                                <a href="{{asset('/js/soft-ui-dashboard.js')}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 grey" style="font-size:15px;"></i> <span class="white">File name</span></a>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <a href="{{asset('/js/soft-ui-dashboard.js')}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 grey" style="font-size:15px;"></i> <span class="white">File name</span></a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <div class="d-flex justify-content-between mt-10">
        <div class="po_re w_60">
            <h2 >Student Assignments</h2>
            <div class="page_bg_2">

                <div class="py-5 mt-5">
                    <div class="Answer_body col-8 mt-3"  style="margin: 0 auto;" id="Answer_scroll">
                        @if($answers->count() > 0)
                            @foreach($answers as $answer)
                        <div class="list-group mb-2">
                            <div href="" class="list-group-item">
                                <div class="d-flex  py-1">
                                    <img src="{{asset('/img/team-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                    <div style="margin: auto 10px;" class="w_70" ><span class="text-dark text-bold">{{$answer->student->student_name}}</span>
                                        <br/>
                                        <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i><span class="font-weight-bold">Recive Date: </span> {{$answer->delivery_date}}</span>
                                    </div>

                                   <!-- <div class="form-check align-middle text-center me-4" style="float: none;">
                                        <input class="form-check-input"  style="float: none;" type="radio" value="" id="flexCheckChecked" >
                                    </div> -->


                                    <div class="align-middle text-center " style="margin-top: 3px;">
          <span onclick="Assigment()" data-id="{{$answer->id}}" data-name="{{$answer->student->student_name}}"
                data-date="{{$answer->delivery_date}}" data-attch="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/Answers'.$answer->file_name)}}"
                data-fname="{{$answer->file_name}}" class="text-secondary font-weight-bold text-xs me-3" id="stData">
            <i class="fas fa-external-link-alt blue-color" style="font-size: 20px;"></i>
          </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                            @endforeach
                        @else
                            <p class="text-center h5">No answers for this assignment yet..</p>
                            @endif
                    </div>

                </div>
            </div>
        </div>
        <div class="po_re w_30 Te_ic">
            <div class="person2"></div>
        </div>


    </div>
    <br/>
    <hr/>
    <!--chat section-->
    <div  class="container-fluid ">

        <div>
            <h3>Comments</h3>
            <hr/>
            <div class="chatsBody2 mb-3" id="BodyText">
                @if(count($assignment->assignmentComments) > 0)
                    @foreach($assignment->assignmentComments as $comment)
                        @if($comment->user_type == 1)
                            <div class="sender2 bg_gr w-50">
                                {{--                <div>--}}
                                {{--                    <img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">--}}
                                {{--                </div>--}}
                                <div class="w-100" style="margin: auto 0;">
                                    <span class="ms-2"><strong>T. {{$comment->username}}</strong></span>
                                </div>
                                <div class="w-100" style="margin: auto 0;">
                                    <span class="ms-2">{{$comment->comment}}</span>
                                </div>
                                <div class="w-100" style="margin: auto 0;">
                                    <small class="ms-2">{{$comment->created_at}}</small>
                                </div>

                            </div>
                        @else
                            <div class="receiver2 bg_gr w-50">
                                {{--                <div>--}}
                                {{--                    <img src="../assets/img/bruce-mars.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">--}}
                                {{--                </div>--}}
                                <div class="w-100" style="margin: auto 0;">
                                    <span class="ms-2"><strong>{{$comment->username}}</strong></span>

                                </div>
                                <div class="w-100" style="margin: auto 0;">
                                    <span class="ms-2">{{$comment->comment}}</span>
                                </div>

                                <div class="w-100" style="margin: auto 0;">
                                    <small class="ms-2">{{$comment->created_at}}</small>
                                </div>

                            </div>
                        @endif
                    @endforeach
                @else
                    <strong class="text-danger">No comments yet.</strong>
                @endif
            </div>

            <div class="input-msg">
                <form method="POST" action="/teacher/assignment" class="row w-100">
                    @csrf
                    @method('POST')
                    <div class="col-11">
                        <input type="text" name="comment" class="form-control w-100" placeholder="Type your comment.." required/>
                    </div>
                    <div class="col-1">
                        <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
                        <input type="hidden" name="level" value="{{$assignment->level_id}}">
                        <button type="submit" name="save_comment" class="btn btn-link">
                            <i class='far fa-paper-plane'></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>




    </div>










    <div class="modal  fade" id="Assigment" tabindex="-1" aria-labelledby="Assigments" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="Assigments">Student Answer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="" id="formData">
                    @csrf
                    @method('PUT')
                <div class="modal-body max-height-vh-80" style="overflow-y:auto">
                    <div class="d-flex justify-content-between">
                        <span class="text-bold" id="studentName"></span><span class="text-bold">Recive Date: <span class="text-bold" id="recDate"></span></span>

                    </div>
                        <div class="my-1 mb-2">
                            <a href="" id="attch" class="btn btn-block btn-secondary bg-dark text-white w-100 py-1 pb-3 pt-3 mt-3" download="">
                            <i class="fas fa-arrow-circle-up white me-2" style="font-size: 18px;"></i>Student Attachments</a></div>
                        <input class="form-control my-1 mb-2" name="mark" type="number" placeholder="Enter Student Marks" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="marks" class="btn btn-outline-primary" >Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
</body>


<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>

<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>


<script>


    $('.files').click(function(e) {
        e.preventDefault();  //stop the browser from following

        var url= "{{asset('js/soft-ui-dashboard.js')}}";
        console.log(url)
        url.download = "fd";


    });
    function Assigment(){
        var id = $('#stData').data('id');
        var name = $('#stData').data('name');
        var date = $('#stData').data('date');
        var attch = $('#stData').data('attch');
        var fname = $('#stData').data('fname');
        $('#formData').attr('action','/teacher/assignment/'+id);
        $('#studentName').html(name);
        $('#recDate').html(date);
        $('#attch').attr('href',attch);
        $('#attch').attr('download',fname);
        $('#Assigment').modal('toggle');
    }
    function Files(){
        alert("When press it will download every student files")
    }
</script>
</html>
