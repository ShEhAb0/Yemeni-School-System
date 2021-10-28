<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 overflowfixside card blur shadow-blur" id="sidenav-main">
    <div class="sidenav-header">
        <!--this is Navbar section 1-->
        <span aria-hidden="true"  id="iconSidenav">
        <i class="fas fa-times cursor-pointer p-0 text-secondary opacity-5 position-absolute end-4 top-4 d-xl-none" ></i>
        </span>
        <!--end this is Navbar section 1-->
        <a class="navbar-brand m-0" target="_blank">
            <img src="{{asset('img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Parent Dashboard</span>
        </a>
    </div>
    <div class="modal-body max-height-vh-30 " >
        <div class="list-group mb-1">
            <div href="" class="list-group-item">
                <div class="d-flex ">
                    <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                    <div style="margin: auto 10px;">
            <span >
              <span class="text-dark text-bold text-sm">Student Name</span><br/>
              <span class="text-xs">Student ID</span>

            </span>
                        <br/>
                    </div>
                    <div class="col-1 text-end mt-2">
                        <a  class="text-secondary font-weight-bold text-xs"
                            data-bs-toggle="modal" href="#exampleModal" role="button">
                            <i class="fas fa-external-link-alt purplel-color" style="font-size: 18px;"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.parent.layouts.menu')

</aside>
