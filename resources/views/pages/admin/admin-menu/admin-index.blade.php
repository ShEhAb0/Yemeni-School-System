@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Admins</h6>

    </div>
@endsection
@section('content')


    <div class="container-fluid">
        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-8">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="search...">
                    </div>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Admin  </button>
                </div>



            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Admins table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Admin Name</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Username</th>

                                        <th class="text-secondary purplel-color opacity-9 text-center">ID</th>
                                        <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                        </td>
                                        <td>

                                            <div class="d-flex px-2 py-1 justify-content-center">
                                                <div>
                                                    <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                                                    <p class="text-sm text-secondary mb-0">laurent@creative-tim.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0">Executive</p>

                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">AD-2324343234</span>
                                        </td>
                                        <td class="align-middle text-center">

                                            <a  class="text-secondary font-weight-bold text-xs  me-3"  data-bs-toggle="modal" href="#examplUpdate" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>


                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1">
                                <input class="form-control my-1 mb-2 " type="text" placeholder="Full Name" aria-label="Full Name">
                                <input class="form-control my-1 mb-2 " type="text" placeholder="Username" aria-label="Username">
                                <input class="form-control my-1 mb-2 " type="Email" placeholder="Email" aria-label="Email">
                                <input class="form-control my-1 mb-2 " type="text" placeholder="ID" aria-label="ID">
                                <div class="row ">
                                    <p>Gender</p>
                                    <div class="form-check col-5 " style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios12" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios22" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            FeMale
                                        </label>
                                    </div>
                                </div>

                                <input class="form-control my-1 mb-2 " type="Password" placeholder="Password" aria-label="Password">
                                <input class="form-control my-1 mb-2 " type="Password" placeholder="Confirm Password" aria-label="Confirm Password">
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save changes</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1">
                                <input class="form-control my-1 mb-2 " type="text" placeholder="Full Name" aria-label="Full Name">
                                <input class="form-control my-1 mb-2 " type="text" placeholder="Username" aria-label="Username">
                                <input class="form-control my-1 mb-2 " type="Email" placeholder="Email" aria-label="Email">
                                <input class="form-control my-1 mb-2 " type="text" placeholder="ID" aria-label="ID">
                                <div class="row ">
                                    <p>Gender</p>
                                    <div class="form-check col-5 " style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            FeMale
                                        </label>
                                    </div>
                                </div>

                                <input class="form-control my-1 mb-2 " type="Password" placeholder="Password" aria-label="Password">
                                <input class="form-control my-1 mb-2 " type="Password" placeholder="Confirm Password" aria-label="Confirm Password">
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modle update-->

@endsection
