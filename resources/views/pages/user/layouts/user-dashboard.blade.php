<html lang="en">

<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">

    <title>
        Yemeni School E-learning

    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}"/>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>


    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css')}}" rel="stylesheet"/>
    <script src="{{asset('/js/jquery-3.3.1.js')}}"></script>

</head>
<body class="g-sidenav-show  bg-gray-100" onload="getNotification();">

@include('pages.user.layouts.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
         navbar-scroll="true">
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

                    <a class="d-flex  py-1 cursor-pointer" href="/profile/{{Auth::user()->id}}">
                        <img src="{{asset('/img/home-decor-2.jpg')}}" class="rounded-circle" alt="Cinque Terre"
                             width="40" height="40">
                        <div style="margin: auto 10px;"><span
                                class="d-sm-inline  text-dark text-bold">{{ Auth::user()->username}}</span>
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
                        <i class="fas fa-envelope cursor-pointer text-dark"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center ">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer text-dark"></i><small class="text-danger"
                                                                                  id="count"></small>
                    </a>

                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton" id="noti">

                    </ul>
                </li>
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
    <!--body for DB-->
    @yield('content')


</main>

<script src="{{asset('/js/popper.min.js')}}"></script>

<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/chartjs.min.js')}}"></script>


<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>
<script src="{{ asset('js/axios.min.js')}}"></script>
<script>
    $(document).ready(function () {
        axios({
            method: 'get',
            url: '/notifications/create'
        })
            .then(response => {
                if (response.status === 200) {
                    $('#noti').html(response.data.nots);
                    $('#count').html(response.data.count);
                }
            })
    })

    setInterval(
        function getNotification() {
            axios({
                method: 'get',
                url: '/notifications/create'
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#noti').html(response.data.nots);
                        $('#count').html(response.data.count);
                    }
                })

        }, 5000);
</script>
@yield('scripts')


</body>
</html>
