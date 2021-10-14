
@extends('pages.parent.layouts.parent-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Today Works</h6>
@endsection
@section('content')


    <div class="container-fluid pt-5">
        <div class="d-flex justify-content-around"  id="lessonmain">


            <div class="card mb-2 col-12  col-sm-12  col-md-12 col-lg-8 col-xl-8 col-xxl-8" style="overflow: hidden;">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="d-flex align-items-center" >
                            <h6 class="mb-0 purplel-color mb-3">Today lessons</h6>
                        </div>
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-around max-height-vh-100 mb-2" id="lessonmain"  style="flex-wrap: wrap;overflow-y: auto;background-color: #f4f5f6;">
                    <div class="card card-body m-2" style="width:45%;" id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-outline-primary w-100 btn-sm mb-0" href="./StudentLessones.html">Go To Lesson</a>


                        </div>
                    </div>
                    <div class="card card-body m-2" style="width:45%;"  id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-outline-primary w-100 btn-sm mb-0" href="./StudentLessones.html">Go To Lesson</a>


                        </div>
                    </div>
                    <div class="card card-body m-2" style="width:45%;"  id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-outline-primary w-100 btn-sm mb-0" href="./StudentLessones.html">Go To Lesson</a>


                        </div>
                    </div>
                    <div class="card card-body m-2" style="width:45%;"  id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-outline-primary w-100 btn-sm mb-0" href="./StudentLessones.html">Go To Lesson</a>


                        </div>
                    </div>
                    <div class="card card-body m-2" style="width:45%;"  id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-outline-primary w-100 btn-sm mb-0" href="./StudentLessones.html">Go To Lesson</a>


                        </div>
                    </div>
                    <div class="card card-body m-2" style="width:45%;"  id="cols" >
                        <div class="p-2">
                            <h5 class="card-title">Lesson Title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher Name</h6>
                            <p  class="text-sm">Upload Date:2021/9/10 12:00 AM</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-outline-primary w-100 btn-sm mb-0" href="./StudentLessones.html">Go To Lesson</a>


                        </div>
                    </div>



                </div>
                <br/>
            </div>



            <div class="card col-12  col-sm-12  col-md-12 col-lg-4 col-xl-4 col-xxl-4  ms-2 mb-2">
                <div class="card-header pb-0 p-3">
                    <h6 class="purplel-color mb-1">Assignments DeadLine</h6>
                </div>
                <div class="max-height-vh-100 p-3" style="overflow-y: auto;background-color: #f4f5f6;">

                    <div class="list-group mb-2">
                        <div href="" class="list-group-item">
                            <div class="block py-1">
                                <div class="text-bold mb-1 text-dark ">Assignments Title</div>
                                <span class="text-dark text-sm">DeadLine: 2021/12/9 12:00 PM</span>


                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-bold ">Subject</span>
                                <div ><span class="text-dark text-sm">Teacher Name</span>

                                </div>
                            </div>
                            <a class="btn btn-primary w-100 btn-sm mb-0 mt-2" href="./StudentAssigment.html">View</a>
                        </div>

                    </div>


                    <div class="list-group mb-2">
                        <div href="" class="list-group-item">
                            <div class="block py-1">
                                <div class="text-bold mb-1 text-dark ">Assignments Title</div>
                                <span class="text-dark text-sm">DeadLine: 2021/12/9 12:00 PM</span>


                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-bold ">Subject</span>
                                <div ><span class="text-dark text-sm">Teacher Name</span>

                                </div>
                            </div>
                            <a class="btn btn-primary w-100 btn-sm mb-0 mt-2" href="./StudentAssigment.html">View</a>
                        </div>

                    </div>


                    <div class="list-group mb-2">
                        <div href="" class="list-group-item">
                            <div class="block py-1">
                                <div class="text-bold mb-1 text-dark ">Assignments Title</div>
                                <span class="text-dark text-sm">DeadLine: 2021/12/9 12:00 PM</span>


                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-bold ">Subject</span>
                                <div ><span class="text-dark text-sm">Teacher Name</span>

                                </div>
                            </div>
                            <a class="btn btn-primary w-100 btn-sm mb-0 mt-2" href="./StudentAssigment.html">View</a>
                        </div>

                    </div>

                    <div class="list-group mb-2">
                        <div href="" class="list-group-item">
                            <div class="block py-1">
                                <div class="text-bold mb-1 text-dark ">Assignments Title</div>
                                <span class="text-dark text-sm">DeadLine: 2021/12/9 12:00 PM</span>


                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-bold ">Subject</span>
                                <div ><span class="text-dark text-sm">Teacher Name</span>

                                </div>
                            </div>
                            <a class="btn btn-primary w-100 btn-sm mb-0 mt-2" href="./StudentAssigment.html">View</a>
                        </div>

                    </div>

                    <div class="list-group mb-2">
                        <div href="" class="list-group-item">
                            <div class="block py-1">
                                <div class="text-bold mb-1 text-dark ">Assignments Title</div>
                                <span class="text-dark text-sm">DeadLine: 2021/12/9 12:00 PM</span>


                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <span class="text-bold ">Subject</span>
                                <div ><span class="text-dark text-sm">Teacher Name</span>

                                </div>
                            </div>
                            <button class="btn btn-primary w-100 btn-sm mb-0 mt-2">View</button>
                        </div>

                    </div>



                </div>
            </div>

        </div>




    </div>

@endsection
