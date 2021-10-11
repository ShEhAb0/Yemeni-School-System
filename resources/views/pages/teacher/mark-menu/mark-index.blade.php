@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Marks</h6>
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

                    <div class="col-auto w_3">
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
                    <div class="col-auto w_3">
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
                    <div class="col-auto w_3">
                        <p>Select Term</p>
                        <select class="form-select" aria-label="Select Class" id="Lesson" name="Lesson">

                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>


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
                            <h6>Marks table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($marks->count() > 0)

                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Student Name</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Attendance</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Assignments</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Exams</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Total</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Moahmmed</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">80</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">90</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">99</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">98%</span>
                                        </td>
                                        <td class="align-middle text-center">

                                            <a  class="text-secondary font-weight-bold text-xs  me-3"  data-bs-toggle="modal" href="#examplUpdate" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs " data-toggle="tooltip" data-original-title="Edit user">
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>


                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no marks yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--modals-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Edit Marks</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2 my-1 py-1">
                                <div class="col-auto w-100">
                                    <p>Attendance</p>
                                    <input class="form-control"  placeholder="Edit Attendance Marks">
                                </div>
                                <div class="col-auto w-100">
                                    <p>Assignments</p>
                                    <input class="form-control"  placeholder="Edit Assignments Marks">
                                </div>
                                <div class="col-auto w-100">
                                    <p>Exams</p>
                                    <input class="form-control"  placeholder="Edit Exams Marks">
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save changes</button>
                        </div>
                    </div>
                </div>

            </div>








        </div>
    </div>

@endsection


