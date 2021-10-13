@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Exams</h6>
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
                <div class="col-8">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="search...">
                    </div>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Exam  </button>
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
                            <h6>Exams table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($exams->count() > 0)

                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Exam title</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Timer</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Exam Starts</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>


                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">60 mins</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>

                                        <td class="align-middle text-center">

                                            <a  class="text-secondary font-weight-bold text-xs  me-3"  data-bs-toggle="modal" href="#examplUpdate" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>

                                            <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#attendance" role="button">
                                                <i class="far fa-id-card blue-color" style="font-size: 20px;"></i>
                                            </a>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no exams yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--modals-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"  style="overflow: auto;">
                        <div class="slideshow-container">

                            <div class="mySlides2">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">edit Exame (1/2)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-2 my-1 py-1">
                                        <div class="col-auto w-100">
                                            <p>Exam Title</p>
                                            <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Exam Title" >
                                        </div>
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

                                        <div class="col-auto w_50">
                                            <p>Exam Starts</p>
                                            <input class="form-control my-1 mb-2 " type="time" placeholder="Exam Starts" >
                                        </div>
                                        <div class="col-auto w_50">
                                            <p>Choose Date</p>
                                            <input class="form-control my-1 mb-2 " type="date" placeholder="Date">
                                        </div>
                                        <div class="col-auto w-100">
                                            <p>Exam Duration</p>
                                            <input class="form-control my-1 mb-2 " type="number" placeholder="Duration">
                                        </div>


                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-primary" >Save</button>
                                </div>


                            </div>

                            <div class="mySlides2">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">edit Questions(2/2)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#addQuestion2">new Question</button>
                                <div class="card-body  pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                            <tr>
                                                <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                                <th class="text-secondary purplel-color opacity-9 text-center ">question title</th>
                                                <th class="text-secondary purplel-color opacity-9  text-center">type</th>
                                                <th class="text-secondary purplel-color opacity-9  text-center">Marks</th>
                                                <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">Multi-Choice</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">10</span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <a  class="text-secondary font-weight-bold text-xs  me-3" data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#EditQuestion" href="#examplUpdate" role="button">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>

                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>


                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">2</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">Biology</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">False or True</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">40</span>
                                                </td>
                                                <td class="align-middle text-center">


                                                    <a  class="text-secondary font-weight-bold text-xs  me-3"  data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#EditQuestion" href="#examplUpdate"role="button">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>

                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>

                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-primary" >Save</button>
                                </div>




                            </div>

                            <a class="prev" onclick="plusSlides2(-1)">❮</a>
                            <a class="next" onclick="plusSlides2(1)">❯</a>
                        </div>



                    </div>

                </div>
            </div>
            <!--new question modal for edit exam-->
            <div class="modal fade" id="EditQuestion" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2 my-1 py-1">
                                    <div class="col-auto w_50">
                                        <p>Write Question</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter question Title" >
                                    </div>
                                    <div class="col-auto w_50">
                                        <p>Enter Question Marks</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Question Marks" >
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>upload Image for Question</p>
                                        <input class="form-control " type="file" id="formFile2" name="formFile2">
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>Choose Question Type</p>
                                        <div class="row g-2">
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choice" id="radio1" value="1">
                                                <label class="form-check-label" for="radio1">
                                                    multiple-choice
                                                </label>
                                            </div>
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choice" id="radio2"  value="2">
                                                <label class="form-check-label" for="radio2">
                                                    True or False
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-100 my-1 mb-2" id="Multi">
                                        <button type="button" class="btn btn-outline-primary" onclick="ADDAnswer()" >add choice</button>

                                        <div class="row g-2" id="Answer">

                                        </div>



                                    </div>

                                    <div class="col-auto w-100 my-1 mb-2" id="bool" >
                                        <p>Select right Answer</p>
                                        <select class="form-select"  id="Boolean" name="Boolean">

                                            <option value="1">True</option>
                                            <option value="2">False</option>

                                        </select>
                                    </div>




                                </form>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="editQuestion(1)">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save</button>
                        </div>


                    </div>
                </div>

            </div>
            <!--edit question modal for New exam-->
            <div class="modal fade" id="EditQuestion2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2 my-1 py-1">
                                    <div class="col-auto w_50">
                                        <p>Write Question</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter question Title" >
                                    </div>
                                    <div class="col-auto w_50">
                                        <p>Enter Question Marks</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Question Marks" >
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>upload Image for Question</p>
                                        <input class="form-control " type="file" id="formFile2" name="formFile2">
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>Choose Question Type</p>
                                        <div class="row g-2">
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choice2" id="radio1" value="1">
                                                <label class="form-check-label" for="radio1">
                                                    multiple-choice
                                                </label>
                                            </div>
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choice2" id="radio2"  value="2">
                                                <label class="form-check-label" for="radio2">
                                                    True or False
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-100 my-1 mb-2" id="Multi2">
                                        <button type="button" class="btn btn-outline-primary" onclick="ADDAnswer2()" >add choice</button>

                                        <div class="row g-2" id="Answer2">

                                        </div>



                                    </div>

                                    <div class="col-auto w-100 my-1 mb-2" id="bool2" >
                                        <p>Select right Answer</p>
                                        <select class="form-select"  id="Boolean" name="Boolean">

                                            <option value="1">True</option>
                                            <option value="2">False</option>

                                        </select>
                                    </div>




                                </form>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="editQuestion(2)">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save</button>
                        </div>


                    </div>
                </div>

            </div>

            <!--new question modal for New exam-->
            <div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2 my-1 py-1">
                                    <div class="col-auto w_50">
                                        <p>Write Question</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter question Title" >
                                    </div>
                                    <div class="col-auto w_50">
                                        <p>Enter Question Marks</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Question Marks" >
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>upload Image for Question</p>
                                        <input class="form-control " type="file" id="formFile2" name="formFile2">
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>Choose Question Type</p>
                                        <div class="row g-2">
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choiced" id="radio1" value="1">
                                                <label class="form-check-label" for="radio1">
                                                    multiple-choice
                                                </label>
                                            </div>
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choiced" id="radio2"  value="2">
                                                <label class="form-check-label" for="radio2">
                                                    True or False
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-100 my-1 mb-2" id="Multied">
                                        <button type="button" class="btn btn-outline-primary" onclick="ADDAnswered()" >add Choice</button>

                                        <div class="row g-2" id="Answered">

                                        </div>



                                    </div>

                                    <div class="col-auto w-100 my-1 mb-2" id="booled" >
                                        <p>Select right Answer</p>
                                        <select class="form-select"  id="Boolean" name="Boolean">

                                            <option value="1">True</option>
                                            <option value="2">False</option>

                                        </select>
                                    </div>




                                </form>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="addQuestion(1)">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save</button>
                        </div>


                    </div>
                </div>

            </div>
            <!--new question modal for edit exam-->
            <div class="modal fade" id="addQuestion2" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2 my-1 py-1">
                                    <div class="col-auto w_50">
                                        <p>Write Question</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter question Title" >
                                    </div>
                                    <div class="col-auto w_50">
                                        <p>Enter Question Marks</p>
                                        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Question Marks" >
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>upload Image for Question</p>
                                        <input class="form-control " type="file" id="formFile2" name="formFile2">
                                    </div>
                                    <div class="col-auto w-100 my-1 mb-2" >
                                        <p>Choose Question Type</p>
                                        <div class="row g-2">
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choiced2" id="radio1" value="1">
                                                <label class="form-check-label" for="radio1">
                                                    multiple-choice
                                                </label>
                                            </div>
                                            <div class="form-check w_50">
                                                <input class="form-check-input" type="radio" name="choiced2" id="radio2"  value="2">
                                                <label class="form-check-label" for="radio2">
                                                    True or False
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-100 my-1 mb-2" id="Multied2">
                                        <button type="button" class="btn btn-outline-primary" onclick="ADDAnswered2()" >add Choice</button>

                                        <div class="row g-2" id="Answered2">

                                        </div>



                                    </div>

                                    <div class="col-auto w-100 my-1 mb-2" id="booled2" >
                                        <p>Select right Answer</p>
                                        <select class="form-select"  id="Boolean" name="Boolean">

                                            <option value="1">True</option>
                                            <option value="2">False</option>

                                        </select>
                                    </div>




                                </form>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="addQuestion(2)">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save</button>
                        </div>


                    </div>
                </div>

            </div>




            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"  style="overflow: auto;">
                        <div class="slideshow-container">

                            <div class="mySlides">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Exam (1/2)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-2 my-1 py-1">
                                        <div class="col-auto w-100">
                                            <p>Exam Title</p>
                                            <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Exam Title" >
                                        </div>
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

                                        <div class="col-auto w_50">
                                            <p>Exam Starts</p>
                                            <input class="form-control my-1 mb-2 " type="time" placeholder="Exam Starts" >
                                        </div>
                                        <div class="col-auto w_50">
                                            <p>Choose Date</p>
                                            <input class="form-control my-1 mb-2 " type="date" placeholder="Date">
                                        </div>
                                        <div class="col-auto w-100">
                                            <p>Exam Duration</p>
                                            <input class="form-control my-1 mb-2 " type="number" placeholder="Duration">
                                        </div>


                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-primary" >Save</button>
                                </div>


                            </div>



                            <div class="mySlides">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Questions(2/2)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#addQuestion">new Question</button>
                                <div class="card-body  pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                            <tr>
                                                <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                                <th class="text-secondary purplel-color opacity-9 text-center ">question title</th>
                                                <th class="text-secondary purplel-color opacity-9  text-center">type</th>
                                                <th class="text-secondary purplel-color opacity-9  text-center">Marks</th>
                                                <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">Multi-Choice</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">10</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a  class="text-secondary font-weight-bold text-xs  me-3" data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#EditQuestion2"  role="button">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>

                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-primary" >Save</button>
                                </div>




                            </div>

                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                        </div>



                    </div>

                </div>
            </div>





        </div>
        <div class="modal fade" id="attendance" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal">Exame attendance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body max-height-vh-60" style="overflow-y:auto">
                        <div class="list-group mb-1">
                            <a href="" class="list-group-item">
                                <div class="d-flex  py-1">
                                    <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                    <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                        <br/>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="list-group mb-1">
                            <a href="" class="list-group-item">
                                <div class="d-flex  py-1">
                                    <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                    <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                        <br/>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="list-group mb-1">
                            <a href="" class="list-group-item">
                                <div class="d-flex  py-1">
                                    <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                    <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                        <br/>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="list-group mb-1">
                            <a href="" class="list-group-item">
                                <div class="d-flex  py-1">
                                    <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                    <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                        <br/>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="list-group mb-1">
                            <a href="" class="list-group-item">
                                <div class="d-flex  py-1">
                                    <img src="../assets/img/home-decor-2.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                    <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                        <br/>
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


@section('scripts')
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/soft-ui-dashboard.js"></script>

    <script>
        $("#bool,#Multi").hide()
        $("input[type=radio][name=choice]").click(function(){
            if($(this).val()==1){
                $("#Multi").show()
                $("#bool").hide()
            }else{
                $("#bool").show()
                $("#Multi").hide()
            }

        });
        $("#bool2,#Multi2").hide()
        $("input[type=radio][name=choice2]").click(function(){
            if($(this).val()==1){
                $("#Multi2").show()
                $("#bool2").hide()
            }else{
                $("#bool2").show()
                $("#Multi2").hide()
            }

        });
        $("#booled,#Multied").hide()
        $("input[type=radio][name=choiced]").click(function(){
            if($(this).val()==1){
                $("#Multied").show()
                $("#booled").hide()
            }else{
                $("#booled").show()
                $("#Multied").hide()
            }

        });
        $("#booled2,#Multied2").hide()
        $("input[type=radio][name=choiced2]").click(function(){
            if($(this).val()==1){
                $("#Multied2").show()
                $("#booled2").hide()
            }else{
                $("#booled2").show()
                $("#Multied2").hide()
            }

        });
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex-1].style.display = "block";

        }

        var slideIndex2 = 1;
        showSlides2(slideIndex2);

        function plusSlides2(n) {
            showSlides2(slideIndex2 += n);
        }

        function currentSlide2(n) {
            showSlides2(slideIndex2 = n);
        }

        function showSlides2(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides2");

            if (n > slides.length) {slideIndex2 = 1}
            if (n < 1) {slideIndex2 = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex2-1].style.display = "block";

        }



        function ADDAnswer(){
            $('#Answer').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${count}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${count});' id="i_${count}"  value="${count}">
  </div>
`)
            count++;
        }
        function ADDAnswer2(){
            $('#Answer2').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${count}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${count});' id="i_${count}"  value="${count}">
  </div>
`)
            count2++;
        }
        function ADDAnswered(){
            $('#Answered').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${counted}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`)
            counted++;
        }
        function ADDAnswered2(){
            $('#Answered2').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${counted}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`)
            counted2++;
        }

        function checkAnswer(id){
            alert($("#i_"+id).parent().prev().val())
        }
        function editQuestion(val){
            if(val==1){
                $("#examplUpdate").modal('show');

            }else if(val==2){
                $("#exampleModal").modal('show');
            }
        }
        function addQuestion(val){
            if(val==1){
                $("#exampleModal").modal('show');

            }else if(val==2){
                $("#examplUpdate").modal('show');
            }
        }
    </script>

@endsection
@endsection
