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
                    <form action="{{ route('teacher.assignments') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
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



            <div class="container-fluid py-1" id="messages">
                <div class="card my-2">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="text-center py-3" id="choose">
                            <p class="h4 text-info">Choose Grade and Subject</p>
                        </div>
                        <div class="text-center py-3 hidden" id="loader">
                            <i class="fa fa-spinner fa-3x fa-spin"></i>
                        </div>
                        <div class="text-center py-3 hidden" id="error">
                            <p class="h4 text-danger">There are no subjects in this grade.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="hidden">
                @include('pages.teacher.assignment-menu.assignment-table')
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
                                    <select class="form-select" aria-label="Select Grade" name="term" required>
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


                                <p class="text-danger">Are you sure you want to delete this assignment?</p>
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
@endsection


@section('scripts')

    <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        function getSubjects(id) {
            $('#choose').addClass('hidden');
            $('#error').addClass('hidden');
            $('#loader').removeClass('hidden');
            axios({
                method: 'get',
                url: '/teacher/get_assignment_subjects/'+id
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#loader').addClass('hidden');
                        $('#choose').removeClass('hidden');
                        $('#subjects').attr('onchange','getAssingments(this.value);');
                        $('#subjects').html(response.data);
                        $('#subjects').attr('disabled',false);
                    }else {
                        $('#loader').addClass('hidden');
                        $('#error').removeClass('hidden');
                    }
                })
        }

        function getAssingments() {
            $('#content').addClass('hidden');
            $('#choose').addClass('hidden');
            $('#error').addClass('hidden');
            $('#messages').removeClass('hidden');
            $('#loader').removeClass('hidden');
            var grade = $('#grades').val();
            var subject = $('#subjects').val();
            axios({
                method: 'get',
                url: '/teacher/get_assignments/'+grade+'/'+subject
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
                url: '/teacher/get_assignments/'+grade+'/'+subject+'?page='+page
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
                        $('#date').val(response.data.date);
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

