@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Students</h6>

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
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Student  </button>
                </div>



            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Students table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($students->count() > 0)

                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Student Name</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Preformance</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Grade</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Username</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Status</th>
                                        <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)

                                        <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$student->id}}</p>
                                        </td>
                                        <td >
                                            <div class="d-flex px-2 py-1 justify-content-center">
                                                <div>
                                                    <img src="{{asset('/img/team-2.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$student->student_name}}</h6>
                                                    <p class="text-sm text-secondary mb-0">{{$student->email}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0">90%</p>

                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0">{{$student->level_id}} + name</p>

                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$student->username}}</span>
                                        </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center {{$student->status == 1 ? "text-info" : "text-danger"}}">
                                                    {{$student->status == 1 ? "Active" : "Suspend"}}
                                                </p>
                                            </td>

                                        <td class="align-middle text-center">
                                            <a  class="text-secondary font-weight-bold text-xs  me-3"  onclick="getStudent({{$student->id}});" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a  class="text-secondary font-weight-bold text-xs me-3" onclick="deleteStudent({{$student->id}});" role="button">
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>
                                            <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#Schedule" role="button">
                                                <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no students yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->


            <div class="modal  fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2"  id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control " required name="student_name" id="student_name" type="text" placeholder="Enter Student Full Name" aria-label="Enter Student Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control " required name="username" id="username" type="text" placeholder="Enter Student Username" aria-label="Enter Student Username">


                                </div>
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" >@</span>
                                    <input type="email" class="form-control  " required name="email" id="email" placeholder="Enter Student Email" aria-label="Email" aria-describedby="basic-addon1">

                                </div>



                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2 " required name="password" type="Password" id="password" placeholder="Password" aria-label="Password">
                                </div>

                                <div class="row ">
                                    <p>Enter Student Gender</p>
                                    <div class="form-check col-5 " style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="phone" id="phone" required placeholder="Enter Student Phone Number" aria-label="Enter Student Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" id="address" required placeholder="Enter Student Address" aria-label="Enter Student Address">
                                </div>

                                <div class="row w_50 ">
                                    <p>Choose Student Term </p>
                                    <select name="term_id" id="term_id" class="form-select"  required>                                        @if($terms->count() > 0)
                                            <option value="" disabled selected>Select the term</option>
                                            @if(isset($terms) && $terms -> count() >0)
                                                @foreach ($terms as $key)
                                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            @endif
                                        @endif
                                    </select>
                                </div>

                                <div class="row w_50">
                                    <p>Choose Student Grade</p>
                                    <select name="level_id" id="level_id" class="form-select"  required>
                                        <option value="" disabled selected>Select the grade</option>
                                        @if(isset($grades) && $grades -> count() >0)
                                            @foreach ($grades as $key)
                                                <option value="{{ $key->id }}">{{ $key->grade_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>


                                <p>Choose Student Status</p>

                                <select name="status" id="status" class="form-select"  required>
                                    <option value="" disabled selected>Choose student status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Suspend</option>
                                </select>




                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save Changes</button>
                                </div>

                            </form>
                    </div>
                </div>


                <!-------------------------Start New Student    ------------------------------->


            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2"  method="POST" action="/admin/students">
                                @csrf
                                @method('POST')
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control " required name="student_name" type="text" placeholder="Enter Student Full Name" aria-label="Enter Student Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control " required name="username" type="text" placeholder="Enter Student Username" aria-label="Enter Student Username">


                                </div>
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" >@</span>
                                    <input type="email" class="form-control  " required name="email" placeholder="Enter Student Email" aria-label="Email" aria-describedby="basic-addon1">

                                </div>



                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2 " required name="password" type="Password" placeholder="Password" aria-label="Password">
                                </div>

                                <div class="row ">
                                    <p>Enter Student Gender</p>
                                    <div class="form-check col-5 " style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios12" value="male" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios22" value="female">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="phone" required placeholder="Enter Student Phone Number" aria-label="Enter Student Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" required placeholder="Enter Student Address" aria-label="Enter Student Address">
                                </div>

                                <div class="row w_50 ">
                                    <p>Choose Student Term </p>
                                    <select class="form-select " aria-label="Choose Student Term" name="term_id" required>
                                        @if($terms->count() > 0)
                                            <option value="" disabled selected>Select the term</option>
                                            @if(isset($terms) && $terms -> count() >0)
                                                @foreach ($terms as $key)
                                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            @endif
                                        @endif
                                    </select>
                                </div>

                                <div class="row w_50">
                                    <p>Choose Student Grade</p>
                                    <select class="form-select " aria-label="Choose Student Grade" name="level_id" required>
                                            <option value="" disabled selected>Select the grade</option>
                                            @if(isset($grades) && $grades -> count() >0)
                                                @foreach ($grades as $key)
                                                    <option value="{{ $key->id }}">{{ $key->grade_name }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>


                                    <p>Choose Student Status</p>

                                    <select name="status" class="form-select"  required>
                                    <option value="" disabled selected>Choose student status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Suspend</option>
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
            <!--Modle update-->



        </div>
    </div>

            <!-------------------------Start Delete Teacher------------------------------->


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" id="deleteForm" action="" method="POST">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}

                                <p>Are you sure you want to delete this student?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-------------------------End Delete Teacher------------------------------->



            @section('scripts')
                <script src="{{asset('js/axios.min.js')}}"></script>
                <script>
                    function getStudent(id) {
                        axios({
                            method:'get',
                            url:'/admin/students/' + id + '/edit'
                        })
                            .then(response =>{
                                if(response.status === 200){
                                    $('#editForm').attr('action','/admin/students/'+id);
                                    $('#student_name').val(response.data.student_name);
                                    $('#username').val(response.data.username);
                                    $('#email').val(response.data.email);
                                    $('#password').val(response.data.password);
                                    $('#phone').val(response.data.phone);
                                    $('#address').val(response.data.address);
                                    $('#term_id').val(response.data.term_id);
                                    $('#level_id').val(response.data.level_id);
                                    $('#status').val(response.data.status);
                                    $('#editModal').modal('show');
                                }
                            })
                    }

                    function deleteStudent(id) {
                        $('#deleteForm').attr('action','/admin/students/'+id);
                        $('#deleteModal').modal('show');
                    }
                </script>
@endsection
@endsection
