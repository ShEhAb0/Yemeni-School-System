<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">
    <title>
        Yemeni School E-learning | Login

    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/NormalPage.css')}}" rel="stylesheet" />
    <script src="{{asset('/js/jquery-3.3.1.js')}}"></script>

    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}"/>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
</head>

<body class="Login_bg">
<div class="container  z-index-sticky top-0">
    <div class="row">
        <div class="col-12 ">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
                        <i class="fa fa-chart-pie opacity-6 text-dark me-1" style="font-size: 36px;"></i> <span style="font-size: 30px;">Courses</span>
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
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">

                                <a href="#" class="btn btn-sm  mb-0  bg-gradient-dark">   <i class="fas fa-key opacity-6  me-2 " style="font-size: 12px;"></i> Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-dark text-gradient">Welcome</h3>
                                <h5 class="mb-0">Choose User to Get Started</h5>

                                <p class="mb-0">Enter your ID and password to login</p>
                            </div>
                            <div class="card-body">
                                <form role="form"  action="{{route('user.login')}}" method="POST">
                                    @csrf

                                    <label>Choose User Type</label>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" id="menu1" name="menu1" onchange="window.open(this.options[this.selectedIndex].value);">
                                            <option value="">Teacher</option>
                                            <option value="{{route('user.login')}}">Student</option>
                                            <option value="http://treasury.dor.alaska.gov/">Parent</option>
                                        </select>
                                    </div>
                                    <label>ID</label>
                                    <div class="mb-3">
                                        <input type="username" class="form-control" placeholder="Enter ID number" aria-label="Enter ID number" name="username"  >
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3" style="position: relative;">
                                        <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password">
                                        <div class="eye" id="switch"><i class="fas fa-eye-slash" style="font-size: 18px;"></i></div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <input type="hidden" value="0" id="passSwitcher" >

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 mt-4 mb-0">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">

                                    <a href="./Newpassword.html" class="text-dark text-gradient font-weight-bold">Forget Password?</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pos_res">
                        <div class="person_bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- -------- START FOOTER 3 w/ SCHOOL DESCRIPTION COPYRIGHT ------- -->
<footer class="footer py-5">
    <div class="container">

        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    Copyright © <script>
                        document.write(new Date().getFullYear())
                    </script>
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
    $("#switch").click(function(){
        if($("#passSwitcher").val()==0){
            document.getElementById("password").type = 'text';
            $("#passSwitcher").val("1")
            $("#switch").text("")
            $("#switch").append(`<i class="fas fa-eye" style="font-size: 18px;"></i>`)
        }else{
            document.getElementById("password").type = 'password';
            $("#passSwitcher").val("0")
            $("#switch").text("")
            $("#switch").append(`<i class="fas fa-eye-slash" style="font-size: 18px;"></i>`)
        }
    });
</script>
<!-- -------- END FOOTER 3 w/ SCHOOL DESCRIPTION COPYRIGHT ------- -->
<!--   Core JS Files   -->
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
    var urlmenu = document.getElementById( 'menu1' );
    urlmenu.onchange = function() {
        window.open( this.options[ this.selectedIndex ].value, '_self');
    };
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>
</body>

</html>
