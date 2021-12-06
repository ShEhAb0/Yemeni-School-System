@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Grade Schedule</h6>
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
                    <form action="{{ route('admin.schedules') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
                </div>



                <div class="col-4 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New Grade Schedule </button>
                </div>
            </div>
        </div>



        <!-------------------------Start Grade Schedule Table------------------------------->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Grade Schedule Table</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            @if($schedules->count() > 0)
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0" id="teachers_data_table">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                            <th class="text-secondary opacity-9 purplel-color text-center">Grade</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">term</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Schedule</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Created Date</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Status</th>
                                            <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($schedules as $schedule)
                                            <tr>
                                                <th scope="row" class="text-sm font-weight-bold text-center">{{$schedule->id}}
                                                </th>

                                                <td class="text-center" >
                                                    <p class="text-sm font-weight-bold mb-0">{{$schedule->grade->grade_name}}</p>

                                                </td>
                                                <td class="text-center">
                                                    <p class="text-sm font-weight-bold mb-0">{{$schedule->term->name}}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <img src="{{asset('/images/grade_schedule/'.$schedule->file_name)}}" class="avatar avatar-sm me-3" alt="user1">
                                                </td>
                                                <td class="text-center">
                                                    <p class="text-sm font-weight-bold mb-0">{{$schedule->created_at}}</p>
                                                </td>
                                                <td class="text-sm font-weight-bold mb-0 text-center {{$schedule->status == 0 ? 'text-danger' : 'text-info'}}">
                                                    {{$schedule->status == 1 ? 'Enabled' : 'Disabled'}}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a  class="text-secondary font-weight-bold text-xs  me-3 "  role="button"  onclick="getSchedule({{$schedule->id}});">
                                                        <i class="fas fa-edit purplel-color editTeacher" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip"  role="button" onclick="deleteSchedule({{$schedule->id}});">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs" href="{{asset('/images/grade_schedule/'.$schedule->file_name)}}" role="button" target="_blank">
                                                        <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
{{--                                <div class="text-center my-5">--}}
{{--                                    {{$schedules->render()}}--}}
{{--                                </div>--}}
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no grades schedule ..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------End Grade Schedule Table------------------------------->



            <!-------------------------Start Edit Grade Schedule------------------------------->

            <div class="modal  fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Grade Schedule</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2" method="POST" id="editForm" action="" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                <select name="level" id="level" class="form-select my-1 mb-2" required>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                        @endforeach
                                </select>

                                <select name="term" id="term" class="form-select my-1 mb-2" required>
                                        @foreach($terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                </select>

                                <div class="form-group my-1 mb-2" >
                                    <label for="schedule">Upload Grade Schedule</label>
                                    <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg" name="schedule">
                                </div>

                                <select name="status" id="status" class="form-select" required>
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
            <!-------------------------End Edit Grade Schedule------------------------------->







            <!-------------------------Start New Grade Schedule------------------------------->
            <div class="jumbotron">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Grade Schedule</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2" action="/admin/schedules" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <select name="level" class="form-select my-1 mb-2" required>
                                        @if($grades->count()>0)
                                        <option value="" disabled selected>Choose level</option>
                                        @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <select name="term" class="form-select my-1 mb-2" required>
                                        @if($terms->count()>0)
                                        <option value="" disabled selected>Choose term</option>
                                        @foreach($terms as $term)
                                        <option value="{{$term->id}}">{{$term->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <div class="form-group my-1 mb-2" >
                                        <label for="schedule">Upload Grade Schedule</label>
                                        <input class="form-control" type="file" required accept="image/png, image/gif, image/jpeg" name="schedule">
                                    </div>

                                    <select name="status" class="form-select" required>
                                        <option value="" disabled selected>Choose schedule status</option>
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-primary">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End New Grade Schedule------------------------------->




            <!-------------------------Start Delete Grade Schedule------------------------------->


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Grade Schedule</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')

                                <p>Are you sure you want to delete this schedule?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-------------------------End Delete Grade Schedule------------------------------->

            </div>
        </div>
        @section('scripts')

            <script src="{{asset('js/axios.min.js')}}"></script>
            <script>
                function getSchedule(id) {
                    axios({
                        method:'get',
                        url:'/admin/schedules/' + id + '/edit'
                    })
                        .then(response =>{
                            if(response.status === 200){
                                $('#editForm').attr('action','/admin/schedules/'+id);
                                $('#level').val(response.data.level_id);
                                $('#term').val(response.data.term_id);
                                $('#status').val(response.data.status);
                                $('#editModal').modal('show');
                            }
                        })
                }

                function deleteSchedule(id) {
                    $('#deleteForm').attr('action','/admin/schedules/'+id);
                    $('#deleteModal').modal('show');
                }
            </script>
@endsection

@endsection


