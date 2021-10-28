<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 overflowfixside card blur shadow-blur" id="sidenav-main">
    <div class="sidenav-header">
        <!--this is Navbar section 1-->
        <span aria-hidden="true"  id="iconSidenav">
        <i class="fas fa-times cursor-pointer p-0 text-secondary opacity-5 position-absolute end-4 top-4 d-xl-none" ></i>
        </span>
        <!--end this is Navbar section 1-->
        <a class="navbar-brand m-0" target="_blank">
            <img src="{{asset('/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Student Dashboard</span>
        </a>
    </div>
    @include('pages.user.layouts.menu')


</aside>
