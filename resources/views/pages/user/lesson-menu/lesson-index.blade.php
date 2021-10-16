@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Lessons</h6>
@endsection
@section('content')



    <div class="container-fluid pt-5">


        <div class="d-flex justify-content-around "  style="max-height: 800px;"  >


            <div class="card overflow-hidden" >
                <div class="card-header pb-3 p-3">
                    <h6 class="mb-3 purplel-color ">Lessons for the subject</h6>
                    <br/>
                    <br/>
                    <br/>
                    <div class="card card-body mx-4 mt-n6 overflow-hidden">
                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-xl-6 " style="margin: 0 auto;">
                                <div class="w-100 my-1">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="search...">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-5 col-xl-5">
                                <div class="w-100 my-1">

                                    <select class="form-select" aria-label="Select Class" id="Subject" name="Subject">
                                        <option disabled="disabled" selected="selected">Select Subject</option>
                                        <option value="1">Math</option>
                                        <option value="2">Arabic</option>
                                        <option value="3">Biolody</option>
                                        <option value="4">English</option>
                                        <option value="5">science</option>
                                        <option value="6">chemistry</option>
                                        <option value="7">History</option>

                                    </select>
                                </div>
                            </div>
                            <br/>
                            <br/>



                        </div>
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-around max-height-vh-100 mb-5"  style="flex-wrap: wrap;overflow-y: auto; background-color: #f4f5f6;">
                    <div class="card card-body m-1" style="width:31.33333%;"  id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-primary w-100 btn-sm mb-0" href="/user/lesson/show">Go To Lesson</a>


                        </div>
                    </div>




                </div>
            </div>




        </div>




    </div>
@endsection
