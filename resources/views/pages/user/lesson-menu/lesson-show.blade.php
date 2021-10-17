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
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />

    <script src="{{asset('/css/customNav.css')}}"></script>
    <link href="{{asset('/css/vedio.css')}}" rel="stylesheet" />
    <link href="{{asset('/vedio/video-js.css')}}" rel="stylesheet" />

        </head>
<body>

<div class="container  z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/lesson">
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
                                    <div style="margin: auto 10;">    <span class="d-sm-inline d-none text-dark text-bold">{{Auth::user()->username}}</span>
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
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
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

    <div class="d-flex align-content-between w-100 mt-5" style="flex-wrap: wrap;margin: 0 auto;box-shadow: 0px -1px 6px 1px rgb(0 0 0 / 41%);border-radius: 18px;">
        <!--Lesson Title Section-->

        <div class="col-12 col-sm-12 col-lg-8 col-xl-8">


            <div class=" p-2 pt-4 w-100"  style="height: 100%;">
                <div class="d-flex justify-content-between w-100 mt-1 mb-1">

                    <h3>{{$lesson->title}}</h3>
                    <span ><i class="fas fa-clock me-2 purplel-color" style="font-size: 15px;"></i><span class="text-sm">Publishing Date: </span><span class="ms-2 text-sm">{{$lesson->created_at}}</span></span>
                </div>
                <div>
                    <p class="black"><i class="fas fa-chalkboard-teacher me-2 purplel-color" style="font-size: 15px;"></i>Teacher Name: <span>{{$lesson->teacher->teacher_name}}</span></p>
                    <p class="black"><i class="fas fa-book-open me-2 purplel-color" style="font-size: 15px;"></i>Subject Related: <span>{{$lesson->subjects->subject_name}} (grade {{$lesson->level_id}})</span></p>
                    <div class="d-flex justify-content-between w_70">
                        <h4 class="">Lesson Description</h4>
                    </div>

                    <p class="p-2 black" style="text-align: justify;" >{{$lesson->description}}</p>


                    <div class="d-flex p-2">
                        <div class="pe-5">
                            <h4 class="mt-3 pb-2" >Photos </h4>
                            <div class="d-flex justify-content-around">
                                @if($lesson->photo)
                                <div>
                                    <a href="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->photo->url)}}" download="filename"><img src="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->photo->url)}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100"></a>
                                </div>
                                    @endif
                            </div>

                            <div class="d-flex justify-content-around mt-2">
                                @if($lesson->photo)
                                <div><a href="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->photo->url)}}" class="files" download="{{$lesson->photo->url}}"><i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;"></i> </a>       </div>
                                    @endif
                            </div>
                        </div>
                        <!--File section-->
                        <div class="ps-5">
                            <h4 class="mt-3 pb-2">Files </h4>
                            <div class="d-flex justify-content-around ">

                                <div>
                                    @if($lesson->doc)
                                    <a href="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->doc->url)}}" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;"></i> <span class="black">{{$lesson->doc->url}}</span></a>
                                        @endif
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
                    @if($lesson->video)
                    <source src="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->video->url)}}" type="video/mp4" />
                    @endif
{{--                    <source src="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4" type="video/mp4" />--}}
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank"
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
<br/>  <hr/>
<!--chat section-->
<div  class="container-fluid ">

    <div>
        <h3>Comments</h3>
        <hr/>
        <div class="chatsBody2 mb-3" id="BodyText">


            <div class="d-flex sender2 bg_gr">
                <div>
                    <img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                    <span class="ms-2">heyy! much better</span>

                </div>

            </div>

            <div class="d-flex sender2 bg_gr">
                <div>
                    <img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                    <span class="ms-2">How did the interview go? was it good?</span>

                </div>

            </div>


            <div class="d-flex sender2 bg_gr">
                <div>
                    <img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                    <span class="ms-2">Wow I'm soo happy for you</span>

                </div>

            </div>

            <div class="d-flex sender2 bg_gr">
                <div>
                    <img src="../assets/img/kal-visuals-square.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                    <span class="ms-2">Wow I'm soo happy for you</span>

                </div>

            </div>


            <div class="d-flex receiver2 bg_gr">
                <div>
                    <img src="../assets/img/bruce-mars.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                    <span class="ms-2">your most welcome</span>

                </div>

            </div>
            <div class="d-flex receiver2 bg_gr">
                <div>
                    <img src="../assets/img/bruce-mars.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                    <span class="ms-2">Thanks</span>

                </div>

            </div>
        </div>
        <hr/>
    </div>




</div>

</body>
<script src="{{asset('/vedio/video-js.css')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>

<script>

    $('.files').click(function(e) {
        e.preventDefault();  //stop the browser from following

        var url= "../assets/js/soft-ui-dashboard.js";
        console.log(url)
        url.download = "fd";


        //window.location.href = '../assets/js/soft-ui-dashboard.js';
    });
    function send(){
        var text=$("#send-input").val()
        $(`
      <div class="d-flex receiver2 bg_gr">
                <div>
                  <img src="../assets/img/bruce-mars.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                  <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                <span class="ms-2">${text}</span>
                 <div class="col-2">
                    <a  class="text-secondary font-weight-bold text-xs  me-1" href="#" role="button">
                        <i class="fas fa-edit text-dark " style="font-size: 15px;"></i>
                                          </a>

                                              <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-1" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash text-dark" style="font-size: 15px;"></i>
                                          </a>

                 </div>
                 </div>

                </div>`).appendTo("#BodyText")
        $("#send-input").val("")
    }
</script>
</html>
