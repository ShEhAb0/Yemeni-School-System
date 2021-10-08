@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
<div >
    <h6 class="font-weight-bolder mb-0">Subjects</h6>

</div>
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
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New Subject  </button>
                </div>



            </div>
        </div>
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Subjects table</h6>
                        </div>

                        <!-------------------------Start Subjects Table------------------------------->

                        <div class="card-body px-0 pt-0 pb-2">
                            @if($subjects->count() > 0)
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="datatable" >
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Subject Name</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Subject Code</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Term</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Grade</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Teacher</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Created at</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Status</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$subject->id}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$subject->subject_name}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$subject->subject_code}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$subject->term->name}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$subject->grade->grade_name}}</p>
                                            </td>
                                            <td>
                                                @foreach($subject->teacher as $teacher)
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$teacher->teacher_name}}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$subject->created_at}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center {{$subject->status == 1 ? "text-info" : "text-danger"}}">
                                                    {{$subject->status == 1 ? "Enabled" : "Disabled"}}
                                                </p>
                                            </td>

                                            <td class="align-middle text-center">

                                                <a  class="text-secondary font-weight-bold text-xs  me-3 "  onclick="getSubject({{$subject->id}});" role="button" >
                                                    <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                </a>
                                                <a  class="text-secondary font-weight-bold text-xs me-3" onclick="deleteSubject({{$subject->id}});" role="button" >
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no subjects yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End Subjects Table------------------------------->



            <!-------------------------Start New Subject------------------------------->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Subject</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/subjects" class="my-1 py-1" >
                                @csrf
                                @method('POST')
                                <input class="form-control my-1 mb-2 " required type="text" name="subject_name" placeholder="Name of Subject" aria-label="Name of Subject">
                                <input class="form-control my-1 mb-2 " required type="text" name="subject_code" placeholder="Subject Code" aria-label="Subject Code">
                                <select class="form-select my-1 mb-2" name="term" required>
                                    @if($terms->count() > 0)
                                    <option value="" disabled selected>Select the term</option>
                                    @foreach($terms as $term)
                                    <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                        @endif
                                </select>
                                <select class="form-select my-1 mb-2" name="grade" required>
                                    @if($grades->count() > 0)
                                        <option value="" disabled selected>Select the grade</option>
                                        @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                        @endforeach
                                        @endif
                                </select>
                                <select class="form-select my-1 mb-2" name="teacher" required>
                                    @if($teachers->count() > 0)
                                    <option value="" disabled selected>Select the teacher</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                        @endforeach
                                        @endif
                                </select>
                                <select class="form-select my-1 mb-2" name="status" required>
                                    <option value="" disabled selected>Select the status</option>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------End New Subject------------------------------->








            <!-------------------------Start Update Subject------------------------------->


            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update Subject</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" method="POST" action="" id="editForm">
                                @csrf
                                @method('PUT')

                                <input class="form-control my-1 mb-2 " type="text" name="subject_name" id="subject_name" placeholder="Name of Subject" aria-label="Name of Subject" >
                                <input class="form-control my-1 mb-2 " type="text" name="subject_code" id="subject_code" placeholder="Subject Code" aria-label="Subject Code">
                                <select class="form-select my-1 mb-2" name="term" id="term" required>
                                    @if($terms->count() > 0)
                                        @foreach($terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select class="form-select my-1 mb-2" name="grade" id="grade" required>
                                    @if($grades->count() > 0)
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->`grade_`name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select class="form-select my-1 mb-2" name="teacher" id="teacher" required>
                                    @if($teachers->count() > 0)
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select class="form-select my-1 mb-2" name="status" id="status">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-------------------------End Update Subject------------------------------->




    <!-------------------------Start Delete Subject------------------------------->


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="my-1 py-1" method="POST" action="" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <p class="text-center text-danger">Are you sure you want to delete this subject?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" >Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-------------------------End Delete Subject------------------------------->
        @section('scripts')
            <script src="{{asset('js/axios.min.js')}}"></script>
            <script>
                function getSubject(id) {
                    axios({
                        method:'get',
                        url:'/admin/subjects/' + id + '/edit'
                    })
                        .then(response =>{
                            if(response.status === 200){
                                $('#editForm').attr('action','/admin/subjects/'+id);
                                $('#subject_name').val(response.data.subject_name);
                                $('#subject_code').val(response.data.subject_code);
                                $('#term').val(response.data.term_id);
                                $('#grade').val(response.data.level_id);
                                $('#status').val(response.data.status);
                                $('#editModal').modal('show');
                            }
                        })
                }

                function deleteSubject(id) {
                    $('#deleteForm').attr('action','/admin/subjects/'+id);
                    $('#deleteModal').modal('show');
                }
            </script>
@endsection
@endsection
