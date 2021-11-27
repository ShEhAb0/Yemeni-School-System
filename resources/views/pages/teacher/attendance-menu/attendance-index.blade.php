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
                    <select class="form-select" aria-label="Select Grade"  name="Grade" id="Grade" onchange="getSubjects(this.value)">
                        <option value="" disabled selected>Select the Grade</option>
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
                    <select class="form-select" aria-label="Select Class" id="subject" name="subject" disabled>
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
                @include('pages.teacher.attendance-menu.attendance-table')
            </div>

            <div class="modal fade" id="attendance" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal">Student attendance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body max-height-vh-80" style="overflow-y:auto" id="modalBody">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
    </div>

@section('scripts')

    <script src="{{ asset('js/axios.min.js')}}"></script>
<script>
    function getSubjects(id) {
        $('#choose').addClass('hidden');
        $('#error').addClass('hidden');
        $('#loader').removeClass('hidden');
        axios({
            method: 'get',
            url: '/teacher/attendance/'+id
        })
            .then(response => {
                if (response.status === 200) {
                    $('#loader').addClass('hidden');
                    $('#choose').removeClass('hidden');
                    $('#subject').attr('onchange','getAttendance(this.value);');
                    $('#subject').html(response.data);
                    $('#subject').attr('disabled',false);
                }else {
                    $('#loader').addClass('hidden');
                    $('#error').removeClass('hidden');
                }
            })
    }
    function getAttendance() {
        $('#content').addClass('hidden');
        $('#choose').addClass('hidden');
        $('#error').addClass('hidden');
        $('#messages').removeClass('hidden');
        $('#loader').removeClass('hidden');
        var grade = $('#Grade').val();
        var subject = $('#subject').val();
        axios({
            method: 'get',
            url: '/teacher/get_teacher_attendance/'+grade+'/'+subject
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
        var grade = $('#Grade').val();
        var subject = $('#subject').val();

        axios({
            method: 'get',
            url: '/teacher/get_teacher_attendance/'+grade+'/'+subject+'?page='+page
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

    function showAttend(d){
        var id = d.data('id');
        d.html('<i class="fa fa-spinner fa-spin"></i>');

        axios({
            method: 'get',
            url: '/teacher/attendance/'+id+'/'+'edit'
        })
            .then(response => {
                d.html('<i class="far fa-id-card purplel-color" style="font-size: 20px;"></i>');
                $('#modalBody').html(response.data);
                $('#attendance').modal('show');
                // $('#loader').addClass('hidden');
                // $('#messages').addClass('hidden');
                // $('#content').html(response.data);
                // $('#content').removeClass('hidden');
            })
    }
</script>
@endsection
@endsection
