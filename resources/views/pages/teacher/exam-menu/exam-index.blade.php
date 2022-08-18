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
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">New Exam
                    </button>
                </div>
                <br/>
                <br/>
                <div class="row g2">

                    <div class="col-auto w_50">
                        <p>Select Grade</p>
                        <select class="form-select" aria-label="Select Grade"  id="grades" name="grade" onchange="getSubjects(this.value);">
                            <option disabled="disabled" selected="selected">Select Grade</option>

                            @if($grades->count()>0)
                                @foreach($grades as $grade)
                                    @foreach($grade as $g)
                                        <option value="{{$g->grade->id}}">{{$g->grade->grade_name}}</option>
                                    @endforeach
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-auto w_50">
                        <p>Select Subject</p>
                        <select class="form-select" aria-label="Select Class" id="subjects" name="subjects" disabled>
                            <option value="" disabled selected>Select the Grade First</option>
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
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Exam title
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Exam
                                                Starts
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Duration
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Status</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Controllers
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">{{$exam->exam_title}}</p>
                                                </td>


                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{$exam->exam_time}}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">{{$exam->duration_m}} Minutes</span>
                                                </td>

                                                <td class="align-middle text-center">
                                            <span
                                                class="text-sm font-weight-bold {{$exam->status == 1 ? 'text-info' : 'text-danger'}}">
                                                {{$exam->status == 1 ? "Show" : " Hidden"}}
                                            </span>
                                                </td>

                                                <td class="align-middle text-center">

                                                    <a class="text-secondary font-weight-bold text-xs  me-3"
                                                       data-id="{{$exam->id}}" data-teacher="{{$exam->teacher_id}}"
                                                       data-title="{{$exam->exam_title}}" data-term="{{$exam->term_id}}"
                                                       data-grade="{{$exam->level_id}}"
                                                       data-subject="{{$exam->subject_id}}"
                                                       data-date="{{$exam->exam_time}}"
                                                       data-duration="{{$exam->duration_m}}"
                                                       data-status="{{$exam->status}}"
                                                       onclick="javascript: updateExam($(this));" id="update_exam"
                                                       role="button">
                                                        <i class="fas fa-edit purplel-color "
                                                           style="font-size: 20px;"></i>
                                                    </a>


                                                    <a
                                                        class="text-secondary font-weight-bold text-xs me-3"
                                                        data-toggle="tooltip"onclick="deleteExam({{$exam->id}}); "  role="button" >
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>

{{--                                                    <a class="text-secondary font-weight-bold text-xs"--}}
{{--                                                       data-bs-toggle="modal" href="#attendance" role="button">--}}
{{--                                                        <i class="far fa-id-card blue-color"--}}
{{--                                                           style="font-size: 20px;"></i>--}}
{{--                                                    </a>--}}
                                                    <a class="text-secondary font-weight-bold text-xs  me-3"
                                                       onclick="showQuestions({{$exam->id}});" role="button">
                                                        <i class="fas fa-question purplel-color "
                                                           style="font-size: 20px;"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
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
            <!--edit Exam model-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Exam </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>

                            <form class="row g-2 my-1 py-1" method="POST" action="" id="editExamFrom">
                                @csrf
                                @method('PUT')
                                <div class="col-auto w-100">
                                    <p>Exam Title</p>
                                    <input name="title" id="title" class="form-control my-1 mb-2 " type="text"
                                           placeholder="Enter Exam Title" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Select Term</p>
                                    <select class="form-select" aria-label="Select Term" name="term" id="term" required>
                                        <option value="" disabled selected>Choose Term</option>
                                        @foreach($terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Grade</p>
                                    <select class="form-select" aria-label="Select Grade" name="grade" id="grade"
                                            required>
                                        <option value="" disabled selected>Choose the Grade</option>
                                        @if($grades->count()>0)
                                            @foreach($grades as $grade)
                                                @foreach($grade as $g)
                                                    <option value="{{$g->grade->id}}">{{$g->grade->grade_name}}</option>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Subject</p>
                                    <select class="form-select" aria-label="Select Subject" name="subject" id="subject"
                                            required>
                                        <option value="" disabled selected>Choose the Subject</option>
                                        @if($teacher_sub->count()>0)
                                            @foreach($teacher_sub as $ts)
                                                <option
                                                    value="{{$ts->subject_id}}">{{$ts->subject->subject_code}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-auto w-100">
                                    <p>Exam Date</p>
                                    <input class="form-control my-1 mb-2 " type="datetime-local" placeholder="date"
                                           name="date" id="date" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Exam Duration</p>
                                    <input class="form-control my-1 mb-2 " type="number" placeholder="duration"
                                           name="duration" id="duration" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Exam Status</p>
                                    <select class="form-select" aria-label="Exam Status" name="status" id="status"
                                            required>
                                        <option value="" disabled selected>Choose the Status</option>
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="teacher_id" id="teacher_id" value="">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" name="update_exam" class="btn btn-outline-primary">Save
                                    </button>
                                </div>
                            </form>


                        </div>

                    </div>

                </div>
            </div>

            <!--Questions table-->
            <div class="modal fade" id="EditQuestion2" tabindex="-1" aria-labelledby="exampleModalLabelUpda2"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add or Edit Questions</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>

                            <button type="button" class="btn btn-outline-primary  ms-2 mt-1" data-bs-toggle="modal"
                                    data-bs-dismiss="modal" data-bs-target="#addQuestion2">new Question
                            </button>
                            <div class="card-body  pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">question
                                                title
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">type</th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Marks</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Controllers
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="examQuestionData">

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close
                                </button>
                                <button type="button" class="btn btn-outline-primary">Save</button>
                            </div>


                        </div>

                    </div>

                </div>
            </div>

            <!--edit question-->
            <div class="modal fade" id="EditQuestion" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST" action="" id="formaddQuestion1">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body row g-2 my-1 py-1">
                                    <div class="col-auto w_50">
                                        <p>Write Question</p>
                                        <input class="form-control my-1 mb-2 " type="text"
                                               placeholder="Enter question Title" name="question" id="question" required>
                                    </div>
                                    <div class="col-auto w_50">
                                        <p>Enter Question Marks</p>
                                        <input class="form-control my-1 mb-2 " type="text"
                                               placeholder="Enter Question Marks" name="mark" id="mark" required>
                                    </div>
                                    {{--                                    <div class="col-auto w-100 my-1 mb-2">--}}
                                    {{--                                        <p>upload Image for Question</p>--}}
                                    {{--                                        <input class="form-control " type="file" id="formFile2" name="formFile2">--}}
                                    {{--                                    </div>--}}
                                    <div class="w-100 my-1 mb-2">
                                        <div class="row g-2">

                                            <div class="form-check w_20">
                                                <label for="i_1">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_1"
                                                       value="1" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number1" id="answer1" required>


                                            <div class="form-check w_20">
                                                <label for="i_2">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_2"
                                                       value="2" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number 2" id="answer2" required>

                                            <div class="form-check w_20">
                                                <label for="i_3">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_3"
                                                       value="3" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number 3" id="answer3" required>

                                            <div class="form-check w_20">
                                                <label for="i_4">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_4"
                                                       value="4" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number 4" id="answer4" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-dismiss="modal" data-bs-target="#EditQuestion2">Close
                                </button>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- new question modal  -->
            <div class="modal fade" id="addQuestion2" tabindex="-1" aria-labelledby="exampleModalLabelUpda"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <form method="POST" action="/teacher/question" id="formaddQuestion2">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body row g-2 my-1 py-1">
                                    {{--                                    <button type="button" class="btn btn-outline-primary" onclick="AddQues2(1)">add--}}
                                    {{--                                        Another Question--}}
                                    {{--                                    </button>--}}

                                    <div class="col-auto w_50">
                                        <p>Write Question</p>
                                        <input name="question" class="form-control my-1 mb-2 " type="text"
                                               placeholder="Enter question Title" required>
                                    </div>
                                    <div class="col-auto w_50">
                                        <p>Enter Question Marks</p>
                                        <input name="mark" class="form-control my-1 mb-2 " type="number"
                                               placeholder="Enter Question Marks" required>
                                    </div>
                                    {{--                                    <div class="col-auto w-100 my-1 mb-2">--}}
                                    {{--                                        <p>upload Image for Question</p>--}}
                                    {{--                                        <input class="form-control " type="file" id="formFile2" name="formFile2">--}}
                                    {{--                                    </div>--}}
                                    <div class="w-100 my-1 mb-2">
                                        <div class="row g-2">

                                            <div class="form-check w_20">
                                                <label for="i_1">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_1"
                                                       value="1" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number1" required>


                                            <div class="form-check w_20">
                                                <label for="i_2">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_2"
                                                       value="2" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number 2" required>

                                            <div class="form-check w_20">
                                                <label for="i_3">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_3"
                                                       value="3" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number 3" required>

                                            <div class="form-check w_20">
                                                <label for="i_4">Correct Answer</label>
                                                <input class="form-check-input" type="radio" name="correct" id="i_4"
                                                       value="4" required>
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer[]"
                                                   placeholder="Enter Answer number 4" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="questionExamId" value="" id="questionExamId">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-dismiss="modal" data-bs-target="#EditQuestion2">Close
                                </button>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <!-- New Exam model -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Exam </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form class="row g-2 my-1 py-1" method="POST" action="/teacher/exam">
                                @csrf
                                @method('POST')
                                <div class="col-auto w-100">
                                    <p>Exam Title</p>
                                    <input name="title" class="form-control my-1 mb-2 " type="text"
                                           placeholder="Enter Exam Title" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Select Term</p>
                                    <select class="form-select" aria-label="Select Term" name="term" required>
                                        <option value="" disabled selected>Choose Term</option>
                                        @foreach($terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Grade</p>
                                    <select class="form-select" aria-label="Select Grade" name="grade" required>
                                        <option value="" disabled selected>Choose the Grade</option>
                                        @if($grades->count()>0)
                                            @foreach($grades as $grade)
                                                @foreach($grade as $g)
                                                    <option value="{{$g->grade->id}}">{{$g->grade->grade_name}}</option>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Subject</p>
                                    <select class="form-select" aria-label="Select Subject" name="subject" required>
                                        <option value="" disabled selected>Choose the Subject</option>
                                        @if($teacher_sub->count()>0)
                                            @foreach($teacher_sub as $ts)
                                                <option
                                                    value="{{$ts->subject_id}}">{{$ts->subject->subject_code}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-auto w-100">
                                    <p>Exam Date</p>
                                    <input class="form-control my-1 mb-2 " type="datetime-local" placeholder="date"
                                           name="date" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Exam Duration</p>
                                    <input class="form-control my-1 mb-2 " type="number" placeholder="duration"
                                           name="duration" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Exam Status</p>
                                    <select class="form-select" aria-label="Exam Status" name="status" required>
                                        <option value="" disabled selected>Choose the Status</option>
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" name="add_exam" class="btn btn-outline-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>


            </div>


            <!--Student Exam attendance model -->

            <div class="modal fade" id="attendance" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal">Exam attendance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body max-height-vh-60" style="overflow-y:auto">
                            <div class="list-group mb-1">
                                <a href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle"
                                             alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;"><span
                                                class="text-dark text-bold">Student Name</span>
                                            <br/>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group mb-1">
                                <a href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle"
                                             alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;"><span
                                                class="text-dark text-bold">Student Name</span>
                                            <br/>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group mb-1">
                                <a href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle"
                                             alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;"><span
                                                class="text-dark text-bold">Student Name</span>
                                            <br/>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group mb-1">
                                <a href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle"
                                             alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;"><span
                                                class="text-dark text-bold">Student Name</span>
                                            <br/>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group mb-1">
                                <a href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="../assets/img/home-decor-2.jpg" class="rounded-circle"
                                             alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10;"><span
                                                class="text-dark text-bold">Student Name</span>
                                            <br/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close
                            </button>

                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------Start Delete Assignment------------------------------->

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Exam</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" action="" method="POST" id="deleteForm">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p class="text-danger">Are you sure you want to delete this exam?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="deleteQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Exam</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" action="" method="POST" id="deleteQuesForm">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p class="text-danger">Are you sure you want to delete this Question?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------End Delete Lesson------------------------------->



        </div>
    </div>


@section('scripts')
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        $("#bool,#Multi").hide()
        $("input[type=radio][name=choice]").click(function () {
            if ($(this).val() == 1) {
                $("#Multi").show()
                $("#bool").hide()
            } else {
                $("#bool").show()
                $("#Multi").hide()
            }

        });
        $("#bool2,#Multi2").hide()
        $("input[type=radio][name=choice2]").click(function () {
            if ($(this).val() == 1) {
                $("#Multi2").show()
                $("#bool2").hide()
            } else {
                $("#bool2").show()
                $("#Multi2").hide()
            }

        });
        $("#booled,#Multied").hide()
        $("input[type=radio][name=choiced]").click(function () {
            if ($(this).val() == 1) {
                $("#Multied").show()
                $("#booled").hide()
            } else {
                $("#booled").show()
                $("#Multied").hide()
            }

        });
        $("#booled2,#Multied2").hide()
        $("input[type=radio][name=choiced2]").click(function () {
            if ($(this).val() == 1) {
                $("#Multied2").show()
                $("#booled2").hide()
            } else {
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

            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex - 1].style.display = "block";

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

            if (n > slides.length) {
                slideIndex2 = 1
            }
            if (n < 1) {
                slideIndex2 = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex2 - 1].style.display = "block";

        }


        function ADDAnswer() {
            $('#Answer').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${count}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${count});' id="i_${count}"  value="${count}">
  </div>
`)
            count++;
        }

        function ADDAnswer2() {
            $('#Answer2').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${count}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${count});' id="i_${count}"  value="${count}">
  </div>
`)
            count2++;
        }

        function ADDAnswered() {
            $('#Answered').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${counted}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`)
            counted++;
        }

        function ADDAnswered2() {
            $('#Answered2').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${counted}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`)
            counted2++;
        }

        function checkAnswer(id) {
            alert($("#i_" + id).parent().prev().val())
        }

        function editQuestion(val) {
            if (val == 1) {
                $("#examplUpdate").modal('show');

            } else if (val == 2) {
                $("#exampleModal").modal('show');
            }
        }

        function addQuestion(val) {
            if (val == 1) {
                $("#exampleModal").modal('show');

            } else if (val == 2) {
                $("#examplUpdate").modal('show');
            }
        }


        function ADDAnswer() {
            $('#Answer').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${count}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${count});' id="i_${count}"  value="${count}">
  </div>
`)
            count++;
        }

        function ADDAnswer2() {
            $('#Answer2').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${count}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${count});' id="i_${count}"  value="${count}">
  </div>
`)
            count2++;
        }

        function ADDAnswered(id = "") {
            $(`#Answered${id}`).append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${counted}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`)
            counted++;
        }

        function ADDAnswered2() {
            $('#Answered2').append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${counted}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`)
            counted2++;
        }

        function checkAnswer(id) {
            alert($("#i_" + id).parent().prev().val())
        }

        function editQuestion(val) {
            if (val == 1) {
                $("#examplUpdate").modal('show');

            } else if (val == 2) {
                $("#exampleModal").modal('show');
            }
        }

        function addQuestion(val) {
            if (val == 1) {
                $("#exampleModal").modal('show');

            } else if (val == 2) {
                $("#examplUpdate").modal('show');
            }
        }

        var data = []
        var coun_qu = 0

        function AddQues(val) {
            data.push({id: 0, answerCount: 0})
            data[coun_qu].id = coun_qu + val
            coun_qu += val

            $(`<hr/>
  <div class="col-auto w_50">
                <p>Write Question ${coun_qu + 1}</p>
                <input class="form-control my-1 mb-2 " type="text" name placeholder="Enter question Title ${coun_qu + 1}" >
              </div>
              <div class="col-auto w_50">
                <p>Enter Question Marks</p>
                <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Question Marks ${coun_qu + 1}" >
              </div>
              <div class="col-auto w-100 my-1 mb-2" >
                <p>upload Image for Question</p>
                <input class="form-control " type="file" id="formFile2" name="formFile${coun_qu + 1}">
              </div>
              <div class="col-auto w-100 my-1 mb-2" >
                <p>Choose Question Type</p>
                <div class="row g-2">
                  <div class="form-check w_50">
                    <input class="form-check-input choiced" type="radio" name="${coun_qu}" id="radio1" value="1">
                    <label class="form-check-label" for="radio1">
                     Muli-choice
                    </label>
                  </div>
                  <div class="form-check w_50">
                    <input class="form-check-input choiced" type="radio" name="${coun_qu}" id="radio2"  value="2">
                    <label class="form-check-label" for="radio2">
                      True or False
                    </label>
                  </div>

                </div>
              </div>

              <div class="w-100 my-1 mb-2 Multied">
                <button type="button" class="btn btn-outline-primary" onclick="ADDAnswereds(${coun_qu - 1})" >add choice</button>

                <div class="row g-2 " id="Answered${coun_qu}">

                </div>



                </div>

                <div class="col-auto w-100 my-1 mb-2 booled" >
                  <p>Select right Answer</p>
                  <select class="form-select"  id="Boolean" name="Boolean">

                    <option value="1">True</option>
                    <option value="2">False</option>

                  </select>
                </div>
   `).appendTo("#formaddQuestion1")
            $(".booled,.Multied").hide()

            $(".choiced").click(function () {
                if ($(this).val() == 1) {

                    $(this).parent().parent().parent().next().show()
                    $(this).parent().parent().parent().next().next().hide()

                } else {

                    $(this).parent().parent().parent().next().next().show()
                    $(this).parent().parent().parent().next().hide()
                }

            });


        }

        function ADDAnswereds(num) {

            data[num].answerCount++
            $(`#Answered${data[num].id}`).append(`
  <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${data[num].answerCount}">
  <div class="form-check w_20">
    <input class="form-check-input" type="radio" name="answer${data.id}" onclick='checkAnswer(${counted});' id="i_${counted}"  value="${counted}">
  </div>
`);
            counted++
        }
    </script>




    <script>
        var data2 = []
        var coun_qu2 = 0

        function AddQues2(val) {
            data2.push({id: 0, answerCount: 0})
            data2[coun_qu2].id = coun_qu2 + val
            coun_qu2 += val

            $(`<hr/>
    <div class="col-auto w_50">
        <p>Write Question ${coun_qu2 + 1}</p>
        <input class="form-control my-1 mb-2 " type="text" name="question[]" placeholder="Enter question Title ${coun_qu2 + 1}" >
    </div>
    <div class="col-auto w_50">
        <p>Enter Question Marks</p>
        <input class="form-control my-1 mb-2 " type="text" placeholder="Enter Question Marks ${coun_qu2 + 1}" >
    </div>
    <div class="col-auto w-100 my-1 mb-2" >
        <p>upload Image for Question</p>
        <input class="form-control " type="file" id="formFile3" name="formFile${coun_qu2 + 1}">
    </div>
    <div class="w-100 my-1 mb-2">
                                        <div class="row g-2" >
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer${coun_qu2}[]" placeholder="Enter Answer number1">
                                            <div class="form-check w_20">
                                                <input class="form-check-input" type="radio" name="correct" id="i_1"  value="1">
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer${coun_qu2}[]" placeholder="Enter Answer number 2">
                                            <div class="form-check w_20">
                                                <input class="form-check-input" type="radio" name="correct"  id="i_2"  value="2">
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer${coun_qu2}[]" placeholder="Enter Answer number 3">
                                            <div class="form-check w_20">
                                                <input class="form-check-input" type="radio" name="correct" id="i_3"  value="3">
                                            </div>
                                            <input class="form-control w_70 my-1 mb-2 me-3 " type="text" name="answer${coun_qu2}[]" placeholder="Enter Answer number 4">
                                            <div class="form-check w_20">
                                                <input class="form-check-input" type="radio" name="correct"  id="i_4"  value="4">
                                            </div>
                                        </div>
                                    </div>
    `).appendTo("#formaddQuestion2")
            $(".booled2,.Multied2").hide()

            $(".choiced22").click(function () {
                if ($(this).val() == 1) {

                    $(this).parent().parent().parent().next().show()
                    $(this).parent().parent().parent().next().next().hide()

                } else {

                    $(this).parent().parent().parent().next().next().show()
                    $(this).parent().parent().parent().next().hide()
                }

            });


        }

        function addQuesti(id){
            $('#questionExamId').val(id);
            $('#addQuestion2').modal('show');
        }

        function ADDAnswereds22(num) {
            data2[num].answerCount++
            $(`#Answered2${data2[num].id}`).append(`
    <input class="form-control w_70 my-1 mb-2 me-3 " type="text" placeholder="Enter Answer number ${data2[num].answerCount}">
    <div class="form-check w_20">
        <input class="form-check-input" type="radio" name="answer${data2.id}" onclick='checkAnswer(${counted2});' id="i_${counted2}"  value="${counted2}">
    </div>
    `);
            counted2++
        }

        function updateExam(d) {
            $('#editExamFrom').attr('action', '/teacher/exam/' + d.data('id'));
            $('#teacher_id').val(d.data('teacher'));
            $('#title').val(d.data('title'));
            $('#term').val(d.data('term'));
            $('#grade').val(d.data('grade'));
            $('#subject').val(d.data('subject'));
            $('#date').value = d.data('date');
            $('#duration').val(d.data('duration'));
            $('#status').val(d.data('status'));
            $('#examplUpdate').modal('show');
        }

        function showQuestions(id){
            axios({
                method:'get',
                url:'/teacher/exam/' + id
            })
                .then(response =>{
                    $('#examQuestionData').html(response.data.data);
                    $('#questionExamId').val(response.data.id);
                    $('#EditQuestion2').modal('show');
                })
        }

        function editQues(d){
            $('#formaddQuestion1').attr('action','/teacher/question/'+d.data('id'));
            $('#question').val(d.data('title'));
            $('#mark').val(d.data('mark'));
            $('#answer1').val(d.data('c1'));
            $('#answer2').val(d.data('c2'));
            $('#answer3').val(d.data('c3'));
            $('#answer4').val(d.data('c4'));
            $('#i_'+d.data('correct')).attr('checked',true);
            $('#EditQuestion').modal('show');
        }
        // click(function (){
        //     // var id= $(this).data('id');
        //     alert('hello');
        // });

        //
        function deleteExam(id) {
            $('#deleteForm').attr('action','/teacher/exam/'+id);
            $('#deleteModal').modal('show');
        }

        function deleteQues(id) {
            $('#deleteQuesForm').attr('action','/teacher/question/'+id);
            $('#deleteQuestionModal').modal('show');
        }

    </script>

    <script>

        function getSubjects(id) {
            $('#choose').addClass('hidden');
            $('#error').addClass('hidden');
            $('#loader').removeClass('hidden');
            axios({
                method: 'get',
                url: '/teacher/get_exam_subjects/'+id
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#loader').addClass('hidden');
                        $('#choose').removeClass('hidden');
                        $('#subjects').attr('onchange','getExams(this.value);');
                        $('#subjects').html(response.data);
                        $('#subjects').attr('disabled',false);
                    }else {
                        $('#loader').addClass('hidden');
                        $('#error').removeClass('hidden');
                    }
                })
        }

        function getExams() {
             $('#content').addClass('hidden');
            $('#choose').addClass('hidden');
            $('#error').addClass('hidden');
            $('#messages').removeClass('hidden');
            $('#loader').removeClass('hidden');
            var grade = $('#grades').val();
            var subject = $('#subjects').val();
            axios({
                method: 'get',
                url: '/teacher/get_exams/'+grade+'/'+subject
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#loader').addClass('hidden');
                        $('#messages').addClass('hidden');
                         $('#content').removeClass('hidden');
                        $('#content').html(response.data);
                    }
                })
        }

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
           $('#content').addClass('hidden');
            $('#messages').removeClass('hidden');
            $('#loader').removeClass('hidden');
            var page = $(this).attr('href').split('page=')[1];
            var grade = $('#grades').val();
            var subject = $('#subjects').val();

            axios({
                method: 'get',
                url: '/teacher/get_exams/'+grade+'/'+subject+'?page='+page
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#loader').addClass('hidden');
                        $('#messages').addClass('hidden');
                        $('#content').html(response.data);
                        $('#content').removeClass('hidden');
                    }
                })
        });
    </script>
@endsection
@endsection
