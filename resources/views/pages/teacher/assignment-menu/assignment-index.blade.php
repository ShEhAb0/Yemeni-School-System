@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Assignments</h6>
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
                <div class="col-sm-12 col-md-7 " style="padding: 10px;">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="search...">
                    </div>
                </div>
                <br/>
                <div class="col-sm-12 col-md-4  text-end" style="padding: 10px;">
                    <button class="btn btn-outline-primary btn mb-0 w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">New Assignment
                    </button>
                </div>
                <br/>
                <br/>
                <div class="row g2">

                    <div class="col-auto w_50">
                        <p>Select Grade</p>
                        <select class="form-select" aria-label="Select Grade"  name="Grade">
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
                        <select class="form-select" aria-label="Select Class"  name="Subject">
                            @if($teacher_sub->count()>0)
                                @foreach($teacher_sub as $ts)
                                    <option value="{{$ts->subject_id}}">{{$ts->subject->subject_code}}</option>
                                @endforeach
                            @endif
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
                            <h6>Assignments table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($assignments->count() > 0)

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Assignment
                                                title
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">DeadLine
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Status
                                            </th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Controllers
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignments as $assignment)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$assignment->id}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$assignment->title}}</p>
                                            </td>


                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold">{{date('Y-m-d' , strtotime($assignment->due_date))}}</span>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center {{$assignment->status == 1 ? "text-danger" : "text-info"}}">
                                                    {{$assignment->status == 1 ? "New" : "Published"}}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">

                                                <a class="text-secondary font-weight-bold text-xs  me-3"
                                                   onclick="javascript:getAssignment({{$assignment->id}})" role="button">
                                                    <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                </a>

                                                <a
                                                   class="text-secondary font-weight-bold text-xs me-3"
                                                   data-toggle="tooltip"onclick="deleteAssignment({{$assignment->id}}); "  role="button" >
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                                <a class="text-secondary font-weight-bold text-xs"
                                                    href="/teacher/assignment/{{$assignment->id}}" role="button">
                                                    <i class="fas fa-external-link-alt purplel-color"
                                                       style="font-size: 20px;"></i>
                                                </a>

                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{$assignments->render()}}
                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no assignments yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            <!-------------------------Start Edit Assignment------------------------------->




            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabelUpda"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update Assignment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2"  id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')

                                <div class="col-auto w-100">
                                    <p>Assignment Title</p>
                                    <input type="text" class="form-control" name="title" id="title" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Assignment Description</p>
                                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Term</p>
                                    <select class="form-select" aria-label="Select Grade" name="term" id="term">
                                        <option value="" disabled selected>Choose the Term</option>
                                        @foreach($terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Grade</p>
                                    <select class="form-select" aria-label="Select Grade" name="grade" id="grade" required>
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
                                    <select class="form-select" aria-label="Select Class" name="subject" id="subject" required>
                                        <option value="" disabled selected>Choose Subject</option>
                                        @if($teacher_sub->count()>0)
                                            @foreach($teacher_sub as $ts)
                                                <option
                                                    value="{{$ts->subject_id}}">{{$ts->subject->subject_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>



                                <div class="col-auto w-50">
                                    <p>Choose DeadLine</p>
                                    <input class="form-control my-1 mb-2" type="date" name="date" id="date"
                                           aria-label="Choose DeadLine" required>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Upload File</p>
                                    <input class="form-control" type="file" name="file" id="file" >
                                </div>
                                <div class="col-auto w-100">
                                    <p>Select Status</p>
                                    <select class="form-select" aria-label="Select Status" name="status" id="status" required>
                                        <option value="" disabled selected>Choose Status</option>
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-------------------------End Edit Assignment------------------------------->




            <!-------------------------Start New Assignment------------------------------->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Assignment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="row g-2 my-1 py-1" method="POST" action="/teacher/assignment" enctype="multipart/form-data">
                            @csrf
                            @method('POST')


                                <div class="col-auto w-100">
                                    <p>Assignment Title</p>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Assignment Description</p>
                                    <textarea name="description" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Select Term</p>
                                    <select class="form-select" aria-label="Select Grade" name="term">
                                        <option value="" disabled selected>Choose the Term</option>
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
                                    <select class="form-select" aria-label="Select Class" name="subject" required>
                                        <option value="" disabled selected>Choose Subject</option>
                                        @if($teacher_sub->count()>0)
                                            @foreach($teacher_sub as $ts)
                                                <option
                                                    value="{{$ts->subject_id}}">{{$ts->subject->subject_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>



                                <div class="col-auto w-50">
                                    <p>Choose DeadLine</p>
                                    <input class="form-control my-1 mb-2" type="date" name="date"
                                           aria-label="Choose DeadLine" required>
                                </div>
                                <div class="col-auto w_50">
                                    <p>Upload File</p>
                                    <input class="form-control" type="file" name="file" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Select Status</p>
                                    <select class="form-select" aria-label="Select Status" name="status" required>
                                        <option value="" disabled selected>Choose Status</option>
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-------------------------End New Assignment------------------------------->



            <!-------------------------Start Delete Assignment------------------------------->


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Assignment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" action="" method="POST" id="deleteForm">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p>Are you sure you want to delete this assignment?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------End Delete Lesson------------------------------->




        </div>
    </div>
@endsection


@section('scripts')

    <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        function getAssignment(id) {
            axios({
                method:'get',
                url:'/teacher/assignment/' + id + '/edit'
            })
                .then(response =>{
                    if(response.status === 200){
                        $('#editForm').attr('action','/teacher/assignment/'+id);
                        $('#term').val(response.data.term_id);
                        $('#grade').val(response.data.level_id);
                        $('#subject').val(response.data.subject_id);
                        $('#title').val(response.data.title);
                        $('#description').val(response.data.description);
                        $('#date').val(response.data.due_date);
                        $('#status').val(response.data.status);
                        $('#editModal').modal('show');
                    }
                })
        }

        function deleteAssignment(id) {
            $('#deleteForm').attr('action','/teacher/assignment/'+id);
            $('#deleteModal').modal('show');
        }

    </script>
@endsection

