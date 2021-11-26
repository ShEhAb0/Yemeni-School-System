<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">

    <title>
        School
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/vedio.css')}}" rel="stylesheet" />
    <link href="{{asset('/vedio/video-js.css')}}" rel="stylesheet" />
    <style>

        .uppercase {
            text-transform: uppercase;
        }
        .btn {
            display: inline-block;
            background: transparent;
            color: inherit;
            font: inherit;
            border: 0;
            outline: 0;
            z-index: 3;
            padding: 0;
            transition: all 200ms ease-out;
            cursor: pointer;
            transform: scale(1.02);

        }
        .btn--primary {
            background: #277553;
            color: #fff;
            border-radius: 2px;
            padding: 12px 36px;
        }
        .btn--primary:hover {
            background: #3e9c73;
            color: #fff;
        }
        .btn--primary:active {
            background: #3e9c73;
            box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, .2);
        }
        .btn--inside {
            margin-left: -96px;
        }
        .mov{
            text-align: right;
            text-align: -webkit-right;
        }
        .form__field {
            width: 73%;
            height: 167px;
            border-radius: 10px;
            background: #fff;
            color: #a3a3a3;

            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
            border: 0;
            outline: 0;
            padding: 22px 18px;
        }
        .mart{
            margin-right: 1.5rem;
            margin-top: 10rem;
        }
        @media only screen and (max-width: 1120px) {
            .mart{

                margin-top: 7rem;
            }
        }
        @media only screen and (max-width: 1220px) {

            .inputDnD .form-control-file{
                margin-left: 10%;
            }
            .form__field {
                width: 61%;
            }
        }
        @media only screen and (max-width: 989px) {
            .page_shape2 {
                height: 597px;
            }
            .inputDnD .form-control-file{
                margin-left: 0%;
            }
            .mart {
                margin-top: 11rem;
                margin-right: 10rem;

            }
            .mov {

                margin-right:12rem;
            }
            .form__field {
                width:66%;
                height: 219px;
            }
            .inputDnD .form-control-file{

                margin-top: 10%;
            }
        }
        @media only screen and (max-width: 871px) {
            .mov {
                margin-right: 3rem;
            }
            .mart {
                margin-right: 5rem;

            }
        }
        @media only screen and (max-width: 771px) {
            .mov {
                margin-right: 1rem;
            }
            .mart {
                margin-top:8rem;
                margin-right: 0rem;
            }
        }
        @media only screen and (max-width: 671px) {
            .mov {
                margin-right: 0rem;
            }
            .form__field {

                height: 179px;
            }

        }
        @media only screen and (max-width: 558px) {
            .inputDnD .form-control-file {
                margin-left: 13%;
                margin-top: -1%;
            }
            .form__field {

                height: 150px;
            }
            .mart {
                margin-top: 6rem;
            }
        }
    </style>
    </style>
</head>
<body>

<div class="container  z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/parent/assignment">
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

                                <a class="d-flex d-flex align-items-center  py-1 cursor-pointer"  href="./ParentProfile.html">
                                    <img src="{{asset('/img/home-decor-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                                    <div style="margin: auto 10px;">    <span class="d-sm-inline d-none text-dark text-bold">{{Auth::user()->username}}</span>
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
                                                    <img src="{{asset('/img/home-decor-2.jpg')}}" class="avatar avatar-sm  me-3 ">
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
                                                    <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
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
<!--body-->
<div class="container-fluid ">

    <br/>
    <br/>
    <br/>
        @if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible text-white fade show mt-4" role="alert">
                    {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
    </div>
        @endif
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible text-white fade show mt-4" role="alert">
            {{$error}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
        </div>
@endforeach
    <!--first row-->
    <div class="d-flex align-content-between w-100 mt-5" style="flex-wrap: wrap;margin: 0 auto;box-shadow: 0px -1px 6px 1px rgb(0 0 0 / 41%);border-radius: 18px;">
        <!--Lesson Title Section-->
        <div class="col-12 col-sm-12 col-lg-8 col-xl-8">


            <div class=" p-2 pt-4 w-100"  style="height: 100%;">
                <div class="d-flex justify-content-between w-100 mt-1 mb-1">

                    <h3 >{{$assignment->title}}</h3>
                    <span ><i class="fas fa-clock me-2 purplel-color" style="font-size: 15px;"></i><span class="text-sm">Publishing Date: </span><span class="ms-2 text-sm">{{$assignment->created_at}}</span></span>
                </div>
                <div>
                    <p class="black"><i class="fas fa-chalkboard-teacher me-2 purplel-color" style="font-size: 15px;"></i>Teacher Name: <span>{{$assignment->teacher->teacher_name}}</span></p>
                    <p class="black"><i class="fas fa-book-open me-2 purplel-color" style="font-size: 15px;"></i>Subject Related: <span>{{$assignment->subjects->subject_name}} (grade {{$assignment->level_id}})</span></p>
                    <div class="d-flex justify-content-between w_70">
                        <h4 class="">Assignment Description</h4>
                    </div>

                    <p class="p-2 black" style="text-align: justify;" >{{$assignment->description}}</p>


                    <div class="d-flex p-2">
{{--                        <div class="pe-5">--}}
{{--                            <h4 class="mt-3 pb-2" >Photos </h4>--}}
{{--                            <div class="d-flex justify-content-around">--}}

{{--                                <div>--}}
{{--                                    <a href="{{asset('/img/home-decor-2.jpg')}}" download="filename"><img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="100" height="100"></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="d-flex justify-content-around mt-2">--}}
{{--                                <div><a href="{{asset('/img/home-decor-2.jpg')}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;"></i> </a>       </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!--File section-->
                        <div class="ps-5">
                            <h4 class="mt-3 pb-2">Files </h4>
                            <div class="d-flex justify-content-around ">

                                <div>
                                    <a href="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->file_name)}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;"></i> <span class="black">{{$assignment->file_name}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>
        <!--vedio Section-->
        <div class="col-12 col-sm-12 col-lg-4 col-xl-4 ">
            <div class="card overflow-hidden" style="height: 100%;">
                <video
                    id="my-video"
                    class="video-js p-2"
                    controls
                    preload="auto"
                    width="100%"
                    height="100%"

                    data-setup="{}"
                >
{{--                    <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4" />--}}
{{--                    <source src="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4" type="video/mp4" />--}}
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
{{--                        <a href="https://videojs.com/html5-video-support/" target="_blank"--}}
                        >supports HTML5 video</a
                        >
                    </p>
                </video>
                <!--File photo section-->








            </div>

        </div>


    </div>
</div>
</div>


<br/>

<div class="d-flex justify-content-around" style="flex-wrap: wrap;">
    <div class="po_re col-12 col-sm-12 col-lg-6 col-xl-6">
        <h2 >Enter Your Answer</h2>
        <div class="page_shape2">
            @if(!$assignment->answer)
            <form class="form" method="POST" action="/assignment" enctype="multipart/form-data">
                @csrf
                @method('POST')
            <div  class="mov" >
                <div class="form-group inputDnD w_30 me-7">
                    <input type="file" name="answer" class="form-control-file grey font-weight-bold" id="inputFile" onchange="readUrl(this)" data-title="Drag and drop a file" required>
                </div>
            </div>
            <div class="text-center mart">
                <div class="container__item">
{{--                        <textarea class="form__field" placeholder="Enter Your Answer (optional) .." ></textarea>--}}
                    <input type="hidden" name="subject_id" value="{{$assignment->subject_id}}">
                    <input type="hidden" name="as_id" value="{{$assignment->id}}">
                    <input type="hidden" name="due" value="{{$assignment->due_date}}">
                        <button type="submit" name="saveAnswer" class="btn btn--primary btn--inside uppercase">Submit</button>
                </div>
            </div>
            </form>
            @else
                    <div class="text-center pt-12">
                    <p class="h4 text-white">you already sent your answer.</p>
                </div>
            @endif
        </div>
    </div>
    <div class="po_re col-12 col-sm-12 col-lg-5 col-xl-5 Te_i" id="pics">
        <div class="person1"></div>
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
                    @if($comment->user_type == 0)
                        <div class="sender2 bg_gr w-50">
                                            <div>
                                                <img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                            </div>
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
                    @else
                        <div class="receiver2 bg_gr w-50">
                                            <div>
                                                <img src="../assets/img/bruce-mars.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                            </div>
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
                    @endif
                @endforeach
            @else
                <strong class="text-danger">No comments yet.</strong>
            @endif
        </div>
        <div class="input-msg">
            <form method="POST" action="/assignment" class="row w-100">
                @csrf
                @method('POST')
                <div class="col-11">
                    <input type="text" name="comment" class="form-control w-100" placeholder="Type your comment.." required/>
                </div>
                <div class="col-1">
                    <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
                    <input type="hidden" name="level" value="{{$assignment->level_id}}">
                    <button type="submit" class="btn btn-link" name="saveComment">
                        <i class='far fa-paper-plane'></i>
                    </button>
                </div>
            </form>
        </div>

        <hr/>
    </div>




</div>
</body>
<script src="{{asset('/vedio/video-js.css')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>

<script>

    $('.files').click(function(e) {
        e.preventDefault();  //stop the browser from following

        var url= "{{asset('/js/soft-ui-dashboard.js')}}";
        console.log(url)
        url.download = "fd";


    });

</script>
</html>
