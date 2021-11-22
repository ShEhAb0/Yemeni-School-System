@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Lessons</h6>
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
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New Lesson</button>
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
                            <h6>Lessons table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($lessons->count() > 0)

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Lesson title</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center ">Lesson status</th>
                                            <th class="text-secondary purplel-color opacity-9  text-center">Publishing Date</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                        </tr>
                                        </thead>
                                        @foreach($lessons as $lesson)

                                            <tbody>
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">{{$lesson->id}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">{{$lesson->title}}</p>
                                                </td>



                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center {{$lesson->status == 1 ? "text-danger" : "text-info"}}">
                                                        {{$lesson->status == 1 ? "New" : "Published"}}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">{{$lesson->created_at}}</span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <a  class="text-secondary font-weight-bold text-xs  me-3"    role="button"   onclick="javascript:getLesson({{$lesson->id}})">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs me-3" role="button" onclick="deleteLesson({{$lesson->id}});">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>
                                                    <a  class="text-secondary font-weight-bold text-xs me-3"  data-bs-toggle="modal" href="#attendance" role="button">
                                                        <i class="far fa-id-card purplel-color" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs  "  href="/teacher/lesson/{{$lesson->id}}" role="button">
                                                        <i class="fas fa-external-link-alt blue-color" style="font-size: 20px;"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no lessons yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->

            <!-------------------------Start New Lesson------------------------------->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Lesson</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2 my-1 py-1" action="/teacher/lesson" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('POST')

                                <div class="col-auto w_50">
                                    <p>Select Term</p>
                                    <select class="form-select" aria-label="Select Term" name="term" required>
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
                                <div class="row">
                                    <p>Select Subject</p>
                                    <select class="form-select" aria-label="Select Class" name="subject" required>
                                        <option value="" disabled selected>Choose the Subject</option>
                                        @if($teacher_sub->count()>0)
                                            @foreach($teacher_sub as $ts)
                                                <option value="{{$ts->subject_id}}">{{$ts->subject->subject_code}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-auto w-100">
                                    <p>Lesson Title</p>
                                    <input class="form-control my-1 mb-2 " type="text" placeholder="Add Lesson Title" aria-label="Add Lesson Title" name="title" required>
                                </div>

                                <div class="col-auto w-100">
                                    <P>Lesson Details</P>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details" required></textarea>

                                </div>
                                <h6>Add Attachments</h6>
                                <div class="row g-2">
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>Upload Video</p>
                                        <input class="form-control " type="file" id="upload_video" name="upload_video" accept="video/mp4,video/x-m4v,video/*" >
                                    </div>
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>Upload Picture</p>

                                        <input class="form-control " type="file" id="upload_image" name="upload_image"  accept="image/png, image/gif, image/jpeg" >
                                    </div>

                                </div>
                                <div class="col-auto w-100  my-1 mb-2" >
                                    <p>Upload File</p>
                                    <input class="form-control " type="file" id="upload_file" name="upload_file"  accept="application/pdf,application/msword,
                                    application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                </div>

                                <p>Choose Lesson Status</p>

                                <select name="status" class="form-select"  required>
                                    <option value="" disabled selected>Choose lesson status</option>
                                    <option value="1">New</option>
                                    <option value="0">Published</option>
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
            <!-------------------------End New Lesson------------------------------->

            <!-------------------------Start Edit Lesson------------------------------->
            <div class="modal  fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Lesson</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2"  id="editForm" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-auto w_50">
                                    <p>Select Term</p>
                                    <select class="form-select my-1 mb-2" name="term" id="term" required>
                                        @if($terms->count() > 0)
                                            <option value="" disabled selected>Select the term</option>
                                            @foreach($terms as $term)
                                                <option value="{{$term->id}}">{{$term->name}}</option>
                                            @endforeach
                                        @endif
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
                                <div class="row">
                                    <p>Select Subject</p>
                                    <select class="form-select" aria-label="Select Class" name="subject" id="subject" required>
                                        <option value="" disabled selected>Choose the Subject</option>
                                        @if($teacher_sub->count()>0)
                                            @foreach($teacher_sub as $ts)
                                                <option value="{{$ts->subject_id}}">{{$ts->subject->subject_code}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-auto w-100">
                                    <p>Lesson Title</p>
                                    <input class="form-control my-1 mb-2 " type="text" placeholder="add Lesson Title" aria-label="add Lesson Title" name="title" id="title" required>
                                </div>

                                <div class="col-auto w-100">
                                    <P>Lesson Details</P>
                                    <textarea class="form-control"  rows="3" name="description" id="description" required ></textarea>

                                </div>

                                <h6>Add Attachments</h6>
                                <div class="row g-2">
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>Upload Video</p>
                                        <input class="form-control " type="file" id="upload_video" name="video" accept="video/mp4,video/x-m4v,video/*" >
                                    </div>
                                    <div class="col-auto w_50 my-1 mb-2" >
                                        <p>Upload Picture</p>
                                        <input class="form-control " type="file" id="upload_image" name="image"  accept="image/png, image/gif, image/jpeg" >
                                    </div>
                                </div>
                                <div class="col-auto w-100  my-1 mb-2" >
                                    <p>Upload File</p>
                                    <input class="form-control " type="file" id="upload_file" name="doc"  accept="application/pdf,application/msword,
                                    application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                </div>

                                <p>Choose Lesson Status</p>

                                <select name="status" class="form-select"  id="status" required>
                                    <option value="" disabled selected>Choose lesson status</option>
                                    <option value="1">New</option>
                                    <option value="0">Published</option>
                                </select>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End Edit Lesson------------------------------->

            <!-------------------------Start Delete Lesson------------------------------->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Lesson</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" action="" method="POST" id="deleteForm">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p class="text-danger">Are you sure you want to delete this lesson?</p>
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
                                        <img src="{{asset('img/home-decor-2.jpg')}}" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10px;"><span class="text-dark text-bold">Student Name</span>
                                            <br/>
                                            <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1</span>
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
        </div>

@section('scripts')

    <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        function getLesson(id) {
            axios({
                method:'get',
                url:'/teacher/lesson/' + id + '/edit'
            })
                .then(response =>{
                    if(response.status === 200){
                        $('#editForm').attr('action','/teacher/lesson/'+id);
                        $('#term').val(response.data.term_id);
                        $('#grade').val(response.data.level_id);
                        $('#subject').val(response.data.subject_id);
                        $('#title').val(response.data.title);
                        $('#description').val(response.data.description);
                        $('#status').val(response.data.status);
                        $('#editModal').modal('show');
                    }
                })
        }

        function deleteLesson(id) {
            $('#deleteForm').attr('action','/teacher/lesson/'+id);
            $('#deleteModal').modal('show');
        }
        function showLesson(id){
            axios({
                method:'get',
                url:'/teacher/lesson/' + id + '/show'
            })
            var newWindow = window.open('/teacher/lesson/' +id);
                        $('#term').val(response.data.term_id);
                        $('#grade').val(response.data.level_id);
                        $('#subject').val(response.data.subject_id);
                        $('#title').val(response.data.title);
                        $('#description').val(response.data.description);
                        $('#status').val(response.data.status);
                        newWindow.my_childs_special_setting = $('#title').val(response.data.title);







        }
    </script>
@endsection

@endsection
