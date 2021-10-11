@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Attendance</h6>
@endsection
@section('content')

    <div class="container-fluid">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible text-white fade show mx-4 mt-4" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
        @endif
        @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible text-white fade show mx-4 mt-4" role="alert">
                    {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                </div>
            @endforeach
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="search...">
                </div>
            </div>


            <br/>
            <br/>
            <div class="row g2">

                <div class="col-auto w_50">
                    <p>Select Grade</p>
                    <select class="form-select" aria-label="Select Grade" id="Grade" name="Grade">

                        <option value="1">Grade 1</option>
                        <option value="2">Grade 2</option>
                        <option value="3">Grade 3</option>


                        <option value="4">Grade 4</option>
                        <option value="5">Grade 5</option>
                        <option value="6">Grade 6</option>


                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>


                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                        <option value="13">Grade 13</option>

                    </select>
                </div>
                <div class="col-auto w_50">
                    <p>Select Subject</p>
                    <select class="form-select" aria-label="Select Class" id="Subject" name="Subject">

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


        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Attendances table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        @if($attendances->count() > 0)

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Lesson Title </th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Date</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">Mohammed</p>
                                    </td>


                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">2021/2/1</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                        </a>


                                        <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#attendance" role="button">
                                            <i class="far fa-id-card purplel-color" style="font-size: 20px;"></i>
                                        </a>


                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="text-center">
                                <p class="h5 text-danger">There are no attendances yet..!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>







    </div>

    <div class="modal fade" id="attendance" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal">Student attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body max-height-vh-80" style="overflow-y:auto">
                    <div class="list-group mb-1">
                        <a href="" class="list-group-item">
                            <div class="d-flex  py-1">
                                <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                <div style="margin: auto 10;" class="w_70" ><span class="text-dark text-bold">Student Name</span>
                                    <br/>
                                    <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1</span>
                                </div>

                                <div class="form-check align-middle text-center me-3" style="float: none;">
                                    <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" >
                                </div>



                            </div>
                        </a>
                    </div>
                    <div class="list-group mb-1">
                        <a href="" class="list-group-item">
                            <div class="d-flex  py-1">
                                <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                <div style="margin: auto 10;" class="w_70" ><span class="text-dark text-bold">Student Name</span>
                                    <br/>
                                    <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1</span>
                                </div>

                                <div class="form-check align-middle text-center me-3" style="float: none;">
                                    <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" checked>
                                </div>



                            </div>
                        </a>
                    </div>

                    <div class="list-group mb-1">
                        <a href="" class="list-group-item">
                            <div class="d-flex  py-1">
                                <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                <div style="margin: auto 10;" class="w_70" ><span class="text-dark text-bold">Student Name</span>
                                    <br/>
                                    <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1 </span>
                                </div>

                                <div class="form-check align-middle text-center me-3" style="float: none;">
                                    <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" >
                                </div>



                            </div>
                        </a>
                    </div>

                    <div class="list-group mb-1">
                        <a href="" class="list-group-item">
                            <div class="d-flex  py-1">
                                <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                <div style="margin: auto 10;" class="w_70" ><span class="text-dark text-bold">Student Name</span>
                                    <br/>
                                    <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1 </span>
                                </div>

                                <div class="form-check align-middle text-center me-3" style="float: none;">
                                    <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" checked>
                                </div>



                            </div>
                        </a>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    //ParentInfo
    //Choose
    $(function () {

        $('#Choose').click(function (e) {

            $('#ParentInfo').toggle();
            $('#parentexsits').toggle();


        });
        $('#Choose2').click(function (e) {

            $('#ParentInfo2').toggle();
            $('#parentexsits2').toggle();


        });
    });
</script>
