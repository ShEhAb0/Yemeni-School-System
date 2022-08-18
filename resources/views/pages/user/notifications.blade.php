<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{'/img/favicon.png'}}">
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
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />

</head>
<body class="g-sidenav-show  bg-gray-100">

<main class="main-content position-relative  mt-1 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">

                <!--this is Navbar section 2 -->

                <h6 class="font-weight-bolder mb-0 title_Dash">Notifications</h6>
            </nav>

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">

                    <a class="d-flex  py-1 cursor-pointer"  href="/profile/{{Auth::user()->id}}">
                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                        <div style="margin: auto 10px;"><span
                                class="d-sm-inline  text-dark text-bold">{{ Auth::user()->username}}</span>
                        </div>
                    </a>
                </li>
{{--                <li class="nav-item px-2 px-sm-2 px-lg-3  px-md-3  px-lx-3 d-flex align-items-center">--}}
{{--                    <a href="./Message.html" class="nav-link text-body p-0">--}}
{{--                        <i class="fas fa-envelope cursor-pointer text-dark" ></i>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item px-3 d-flex align-items-center">

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-dark me-sm-1"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!--body for Tracking-->
    <div class="container-fluid">
        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body blur shadow-blur mx-4 mt-n6 notify">



            <div class="row">
                <div class="col-12 ">
                    <div class="mb-1">

                        @foreach ($notifications as $notification)
                            <a class="dropdown-item border-radius-md" href="/notifications/{{$notification->id}}">

                            <div class="card-body px-0 pt-0 pb-0">


                            <div class="d-flex justify-content-around bg-gray-100 border-radius-lg mt-1 stud_card_resp1">
                                <div class="my-auto col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 rounded-circle_resp1">
                                    <img src="{{asset('img/logo-ct.png')}}" class="avatar avatar-sm  me-3 ">
                                </div>
                                <div class="my-auto col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 icon_center_text1" >
                                    <h6 class="text-md font-weight-normal ">
                                        <span class="font-weight-bold">{{$notification->title}}</span>
                                    </h6>
                                </div>

                                <div  class="my-auto col-12 col-sm-5 col-md-6 col-lg-6 col-xl-6 icon_center_text1">
                                    <p class="text-sm text-secondary text_resp_title">

                                        {{$notification->details}}
                                    </p>
                                </div>
                                <div class="my-auto col-12 col-sm-auto col-md-auto col-lg-auto col-xl-auto icon_center_text1">
                                    <p class="text-xs text-secondary mb-2 mb-lg-0 mb-md-0 mb-xl-0 text_resp_desc">
                                        <i class="fa fa-clock me-1"></i>
                                          {{\Carbon\Carbon::parse($notification->created_at,"Asia/Riyadh")->diffForHumans()}}

                                    </p>
                                </div>
                            </div>


{{--                            <div class="d-flex py-1">--}}
{{--                                <div class="my-auto">--}}
{{--                                    <img src="{{asset('img/logo-ct.png')}}" class="avatar avatar-sm  me-3 ">--}}
{{--                                </div>--}}
{{--                                <div class="d-flex flex-column justify-content-center">--}}
{{--                                    <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                        <span class="font-weight-bold">{{$notification->title}}</span>--}}
{{--                                    </h6>--}}
{{--                                    <p class="text-secondary mb-0 text-truncate">--}}
{{--                                        {{$notification->details}}--}}
{{--                                    </p>--}}
{{--                                    <p class="text-xs text-secondary mb-0 text-truncate">--}}
{{--                                        <i class="fa fa-clock me-1"></i>--}}
{{--                                        {{\Carbon\Carbon::parse($notification->created_at,"Asia/Riyadh")->diffForHumans()}}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}



                        </div>
                            </a>
                        @endforeach
                            <div>
                                {{$notifications->render()}}
                            </div>
                    </div>
                </div>
            </div>
            <!--end-->




        </div>
    </div>
</main>
</body>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>

