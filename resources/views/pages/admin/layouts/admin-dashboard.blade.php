<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href=" {{url('/img/favicon.png')}}">
    <title>
        Yemeni School E-learning
    </title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet"/>

    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />
    <!-- cdn data tables -->
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
    <link href="{{asset('css/dataTables.min.css')}}">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8673c3c7ef.js" crossorigin="anonymous"></script>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
</head>



<body class="g-sidenav-show  bg-gray-100" onload="getNotification();">

@include('pages.admin.layouts.sidebar')

<!--     Navbar Start     -->
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
             @yield('navbar')

            </nav>

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1 text-dark"></i>
                        <span class="d-sm-inline text-dark text-bold">{{ Auth::user()->username}}</span>
                    </a>
                </li>
              <!---  <li class="nav-item d-xl-none ps-3 d-flex align-items-center ">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li> -->
                <li class="nav-item px-3 d-flex align-items-center">
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center ">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer text-dark"></i><small class="text-danger" id="count"></small>
                    </a>

                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton" id="noti">

                    </ul>
                </li>

                <li class="nav-item px-3 d-flex align-items-center">

                    <a href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-dark me-sm-1"></i>
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf

                    </form>
                </li>
            </ul>
        </div>
        </div>
    </nav>

    <!--     Navbar End     -->
    @yield('content')


</main>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}


{{--<script src="{{asset('js/jquery.js')}}"></script>--}}
<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{ asset('js/popper.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>--}}

<script src="{{ asset('js/soft-ui-dashboard.js')}}"></script>
<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
{{--<script type="text/javascript" src="/test/wp-content/themes/child/script/jquery.jcarousel.min.js"></script>--}}
<script src="{{ asset('js/axios.min.js')}}"></script>
<script>
    $(document).ready(function(){
        axios({
            method:'get',
            url:'/admin/notifications/create'
        })
            .then(response =>{
                if(response.status === 200){
                    $('#noti').html(response.data.nots);
                    $('#count').html(response.data.count);
                }
            })
    })

    setInterval(
    function getNotification() {
        axios({
            method:'get',
            url:'/admin/notifications/create'
        })
            .then(response =>{
                if(response.status === 200){
                    $('#noti').html(response.data.nots);
                    $('#count').html(response.data.count);
                }
            })

    },5000);
</script>
<!-- Admin Edit and Delete Script -->
@yield('scripts')


</body>
</html>
