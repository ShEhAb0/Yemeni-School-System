@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Grades</h6>

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
                    <form action="{{ route('admin.grades') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
                </div>
                <!-- New Grade -->
                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">New Grade
                    </button>
                </div>


            </div>
        </div>

        <!-------------------------Start Grades Table------------------------------->
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Grades table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($grades->count() > 0)
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="datatable">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Grade Name</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Grade Code</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Students Number</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($grades as $grade)
                                        <tr>
                                            <td class="text-secondary text-sm font-weight-bold text-center">
                                                {{$grade->id}}
                                            </td>
                                            <td class="text-sm font-weight-bold mb-0 text-center">
                                                {{$grade->grade_name}}
                                            </td>
                                            <td class="text-sm font-weight-bold mb-0 text-center">
                                                {{$grade->grade_code}}
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">{{count($grade->students)}}</p>

                                            </td>
                                            <td class="text-sm font-weight-bold mb-0 text-center {{$grade->status == 0 ? 'text-danger' : 'text-info'}}">
                                                {{$grade->status == 1 ? 'Enabled' : 'Disabled'}}
                                            </td>
                                            <td class="align-middle text-center">

                                                <a class="text-secondary font-weight-bold text-xs  me-3 " role="button" onclick="getGrade({{$grade->id}});">
                                                    <i class="fas fa-edit purplel-color  " style="font-size: 20px;"></i>
                                                </a>

                                                <a class="text-secondary font-weight-bold text-xs me-3 " role="button" onclick="deleteGrade({{$grade->id}});">
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                <div class="text-center my-5">
                                    {{$grades->render()}}
                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no grades ..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End Grades Table------------------------------->


            <!-------------------------Start New Grade------------------------------->


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Grade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" method="POST" action="/admin/grades">
                                @csrf
                                @method('POST')

                                <input class="form-control my-1 mb-2" required   type="text" placeholder="Grade Name" name="grade_name"
                                       aria-label="Grade Name">
                                <input class="form-control my-1 mb-2" required type="text"  placeholder="Grade Code"
                                       name="grade_code" aria-label="Grade Code" >
                                <select name="status" class="form-select" required>
                                    <option value="" disabled selected>Choose grade status</option>
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

            <!-------------------------End New Grade------------------------------->




            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1"  id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')

                                <input class="form-control my-1 mb-2 " type="text" name="grade_name" id="grade_name" placeholder="Subject Code" aria-label="Subject Code">
                                <input class="form-control my-1 mb-2 " type="text" name="grade_code" id="grade_code" placeholder="Name of Subject" aria-label="Name of Subject" >
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

        </div>
    </div>


    <!-------------------------End Update Grade------------------------------->


    <!-------------------------Start Delete Grade------------------------------->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="my-1 py-1"  id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <p class="text-danger text-center">Are you sure you want to delete this grade?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-danger" >Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-------------------------End Delete Grade------------------------------->
        @section('scripts')
            <script src="{{asset('js/axios.min.js')}}"></script>
            <script>
                function getGrade(id) {
                    axios({
                        method:'get',
                        url:'/admin/grades/' + id + '/edit'
                    })
                        .then(response =>{
                            if(response.status === 200){
                                $('#editForm').attr('action','/admin/grades/'+id);
                                $('#grade_name').val(response.data.grade_name);
                                $('#grade_code').val(response.data.grade_code);
                                $('#status').val(response.data.status);
                                $('#editModal').modal('show');
                            }
                        })
                }

                function deleteGrade(id) {
                    $('#deleteForm').attr('action','/admin/grades/'+id);
                    $('#deleteModal').modal('show');
                }
            </script>
@endsection
@endsection
