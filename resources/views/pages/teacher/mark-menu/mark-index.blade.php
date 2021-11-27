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
                        <select class="form-select" aria-label="Select Grade" id="grade_id" name="grade" onchange="$('#subject_id').prop('disabled',false)">
                            <option value="" disabled selected>Select Grade</option>
                            @if($grades->count()>0)
                                @foreach($grades as $grade)
                                    @foreach($grade as $g)
                                        <option value="{{$g->grade->id}}">{{$g->grade->grade_name}}</option>
                                    @endforeach
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-auto w_3">
                        <p>Select Subject</p>
                        <select class="form-select" aria-label="Select Subject" id="subject_id" name="subject" onchange="$('#term_id').prop('disabled',false)" disabled>
                            <option value="" disabled selected>Select Subject</option>
                            @if($teacher_sub->count()>0)
                                @foreach($teacher_sub as $ts)
                                    <option value="{{$ts->subject_id}}">{{$ts->subject->subject_code}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-auto w_3">
                        <p>Select Term</p>
                        <select class="form-select" aria-label="Select Term" id="term_id" name="term" onchange="showMarks(this.value)" disabled>
                            <option value="" disabled selected>Select Term</option>
                            @foreach($terms as $term)
                                <option value="{{$term->id}}">{{$term->name}}</option>
                            @endforeach
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
                                    <tbody id="tableData">
                                    @include('pages.teacher.mark-menu.mark-table')
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
                        <form method="POST" action="" class="row g-2 my-1 py-1" id="formData">
                            @csrf
                            @method('PUT')
                        <div class="modal-body">
                                <div class="col-auto w-100">
                                    <p>Attendance</p>
                                    <input class="form-control" name="attend" id="attend" placeholder="Edit Attendance Marks" required>
                                </div>
                                <div class="col-auto w-100">
                                    <p>Assignments</p>
                                    <input class="form-control" name="assign" id="assign" placeholder="Edit Assignments Marks" required>
                                </div>
                        </div>
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
@section('scripts')
    <script>
        function updateMark(d){
            $('#formData').attr('action','/teacher/mark/'+d.data('id'))
            $('#attend').val(d.data('attendance'));
            $('#assign').val(d.data('assignment'));
            $('#examplUpdate').modal('show');
        }

        function showMarks(term){
            var grade = $('#grade_id').val();
            var subject = $('#subject_id').val();
            $('#tableData').html('<tr><td colspan="7" class="text-center text-danger">Please Wait.</td></tr>');
            axios({
                method:'get',
                url:'/teacher/mark/'+grade +'/'+ subject +'/'+ term
            })
                .then(response => {
                    $('#tableData').html(response.data);
                    $('#paginat').addClass('pagination');
                })
        }

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            $('#tableData').html('<tr><td colspan="7" class="text-center text-danger">Please Wait.</td></tr>');
            var page = $(this).attr('href').split('page=')[1];
            var term = $('#term_id').val();
            var grade = $('#grade_id').val();
            var subject = $('#subject_id').val();

            axios({
                method: 'get',
                url: '/teacher/mark/'+grade +'/'+ subject +'/'+ term+'?page='+page
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#tableData').html(response.data);
                        $('#paginat').addClass('pagination');
                    }
                })
        });
    </script>
@endsection
@endsection


