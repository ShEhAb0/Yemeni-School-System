<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">
    <title>
        Yemeni School E-learning

    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}"/>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>


    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('/js/jquery-3.3.1.js')}}"></script>

</head>
<body class="g-sidenav-show  bg-gray-100">
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">

                <!--this is Navbar section 2-->
                <div class="d-xl-none pe-1 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link blue-color p-0" id="iconNavbarSidenav">
                        <i class="fas fa-bars" style="font-size: 22px;"></i>
                        <div class="sidenav-toggler-inner text-dark">
                        </div>
                    </a>
                </div>
                <!--this is Navbar section 2-->
                <h5>Choose Student</h5>
            </nav>

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">

                    <a class="d-flex  py-1 cursor-pointer"  href="/parent/profile">
                        <img src="{{asset('/img/home-decor-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                        <div style="margin: auto 10px;">    <span class="d-sm-inline text-dark text-bold">{{ Auth::user()->username}}</span>
                        </div>
                    </a>
                </li>
                <!-- <li class="nav-item d-xl-none ps-3 d-flex align-items-center ">
                     <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                         <div class="sidenav-toggler-inner">
                             <i class="sidenav-toggler-line"></i>
                             <i class="sidenav-toggler-line"></i>
                             <i class="sidenav-toggler-line"></i>
                         </div>
                     </a>
                 </li> -->
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

                    <a href="{{ route('parent.logout') }}"
                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-dark me-sm-1"></i>
                    </a>

                    <form id="logout-form" action="{{ route('parent.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!--body for DB-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Managment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div>
                        <p class="text-left">Choose Student</p>

                        <div class="modal-body max-height-vh-60" style="overflow-y:auto">
                            @foreach($parents_us as $p)
                                <div class="list-group mb-1">
                                    <div href="" class="list-group-item">
                                        <div class="d-flex  py-1">
                                            <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                            <div style="margin: auto 10px;">
                    <span >
                      <span class="text-dark text-bold">{{$p->user->student_name}}</span><br/>
                      <span>{{$p->user->username}}</span>
                      <span>{{$p->user->level_id}}</span>
                    </span>

                                                <br/>
                                            </div>
                                            <div class="col-5 text-end mt-2">
                                                <a  class="text-secondary font-weight-bold text-xs"  href="/parent/index/{{$p->id}}" role="button">
                                                    <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="text-center mx-auto" style="max-width: 500px">
            <form method="POST" action="/parent/choose">
                @csrf
                @method('POST')
            @foreach($parents_us as $p)
                <div class="list-group mb-1">
                    <div href="" class="list-group-item">
                        <div class="d-flex  py-1">
                            <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                            <div style="margin: auto 10px;">
                    <span >
                      <span class="text-dark text-bold">{{$p->user->student_name}}</span><br/>
                      <span>{{$p->user->username}}</span><span> - Grade: {{$p->user->level_id}}</span>
                    </span>

                                <br/>
                            </div>
                            <div class="mt-2 ms-auto">

                                    <div class="form-check">
                                <input type="radio" name="student" class="form-check-input" value="{{$p->user->id}}">
                                    </div>
{{--                                <a  class="text-secondary font-weight-bold text-xs"  href="/parent/choose-student" role="button">--}}
{{--                                    <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-2">Continue</button>
                </div>
            </form>
        </div>
    </div>




</main>

<script src="{{asset('/js/popper.min.js')}}"></script>

<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/chartjs.min.js')}}"></script>


<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>
    <script>

        function showUser(id){
            axios({
                method:'get',
                url:'/parent/index/' + id + '/show'
            })
            var newWindow = window.open('/parent/index/' +id);
            newWindow.my_childs_special_setting = $('#title').val(response.data.title);

        }
    </script>
</body>
</html>
