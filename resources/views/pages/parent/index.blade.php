@extends('pages.parent.layouts.parent-dashboard')

@section('content')

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
                            <div class="list-group mb-1">
                                <div href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10px;">
                    <span >
                      <span class="text-dark text-bold">Student Name</span><br/>
                      <span>Student ID</span>
                      <span>class</span>
                    </span>
                                            <br/>
                                        </div>
                                        <div class="col-5 text-end mt-2">                <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#Schedule" role="button">
                                                <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group mb-1">
                                <div href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;">
                    <span >
                      <span class="text-dark text-bold">Student Name</span><br/>
                      <span>Student ID</span>
                      <span>class</span>
                    </span>
                                            <br/>
                                        </div>
                                        <div class="col-5 text-end mt-2">                <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#Schedule" role="button">
                                                <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i></a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group mb-1">
                                <div href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;">
                    <span >
                      <span class="text-dark text-bold">Student Name</span><br/>
                      <span>Student ID</span>
                      <span>class</span>
                    </span>
                                            <br/>
                                        </div>
                                        <div class="col-5 text-end mt-2">                <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#Schedule" role="button">
                                                <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i></a></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
@endsection
