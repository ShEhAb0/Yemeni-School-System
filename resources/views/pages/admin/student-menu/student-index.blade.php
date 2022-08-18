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
                    <form action="{{ route('admin.students') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
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
{{--                                            <th class="text-secondary opacity-9 purplel-color text-center">Preformance</th>--}}
                                            <th class="text-secondary purplel-color opacity-9 text-center">Grade</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Username</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Status</th>
                                            <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $students)

                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}</p>
                                                </td>
                                                <td >
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div>
                                                            <img src="{{asset('/images/usersProfiles/'.$students->image)}}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$students->student_name}}</h6>
                                                            <p class="text-sm text-secondary mb-0">{{$students->email}}</p>
                                                        </div>
                                                    </div>
                                                </td>
{{--                                                <td class="text-center">--}}
{{--                                                    <p class="text-sm font-weight-bold mb-0">90%</p>--}}

{{--                                                </td>--}}
                                                <td class="text-center">
                                                    <p class="text-sm font-weight-bold mb-0">{{$students->grade->grade_name}}</p>

                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold">{{$students->username}}</span>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center {{$students->status == 1 ? "text-info" : "text-danger"}}">
                                                        {{$students->status == 1 ? "Active" : "Suspend"}}
                                                    </p>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <a  class="text-secondary font-weight-bold text-xs  me-3"  onclick="getStudent({{$students->id}});" role="button">
                                                        <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs me-3" onclick="deleteStudent({{$students->id}});" role="button">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>
                                                    <a  class="text-secondary font-weight-bold text-xs" data-name="{{$students->student_name}}" data-username="{{$students->username}}" data-email="{{$students->email}}" data-gender="{{$students->gender}}" data-phone="{{$students->phone}}" data-address="{{$students->address}}" onclick="showStudent($(this));" role="button">
                                                        <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center my-5">
{{--                                    {{$students->render()}}--}}
                                </div>

                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no students ..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->



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
                            <span class="input-group-text mr-2">@</span>
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
                            <select class="form-select my-1 mb-2" name="term" required>
                                @if($terms->count() > 0)
                                    <option value="" disabled selected>Select the term</option>
                                    @foreach($terms as $term)
                                        <option value="{{$term->id}}">{{$term->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="row w_50">
                            <p>Choose Student Grade</p>
                            <select class="form-select my-1 mb-2" name="grade" required>
                                @if($grades->count() > 0)
                                    <option value="" disabled selected>Select the grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
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
                                    <input class="form-control my-1 mb-2"  name="password" type="Password" id="password" placeholder="Password" aria-label="Password">

                                </div>

                                <div class="row ">
                                    <p>Enter Student Gender</p>
                                    <div class="form-check col-5 " style="margin-left: 20px;">
                                        <input class="form-check-input gender" type="radio" name="gender" id="male" value="male" required>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input gender" type="radio" name="gender" id="female" value="female" required>
                                        <label class="form-check-label" for="female">
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
                                    <select class="form-select my-1 mb-2" name="term_id" id="term_id" required>
                                        @if($terms->count() > 0)
                                            <option value="" disabled selected>Select the term</option>
                                            @foreach($terms as $term)
                                                <option value="{{$term->id}}">{{$term->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="row w_50">
                                    <p>Choose Student Grade</p>
                                    <select class="form-select my-1 mb-2" name="level_id" id="level_id" required>
                                        @if($grades->count() > 0)
                                            <option value="" disabled selected>Select the grade</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
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
                </div>
            </div>
            <!-------------------------End Edit Teacher------------------------------->



            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="d-flex justify-content-start" style="flex-wrap: wrap;">
                                <div class="container-fluid py-4">

                                    <div class="col-12 p-2" style="margin: 0 auto;">
                                        <div class="card h-100">
                                            <div class="card-header pb-0 p-3 " >
                                                <div class="row">
                                                    <div class="col-md-8 d-flex align-items-center ">
                                                        <h6 class="mb-0 ">Teacher Information</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-3 ">
                                                <br/>

                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm" ><strong class="text-dark " id="tname" >Name: </strong> &nbsp;</li>
                                                    <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark " id="tusername">Username: </strong> &nbsp; </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark" id="temail">Email: </strong> &nbsp; </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark" id="taddress">Address: </strong> &nbsp; </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark" id="tphone">Phone Number: (+967) </strong> &nbsp; </li>
                                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark" id="tgender">Gender: </strong> &nbsp; </li>


                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


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

                                <p class="text-danger">Are you sure you want to delete this student?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




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
                        $('#'+response.data.gender).attr('checked',true);
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
    <script>


        function showStudent(d){
            $('#tname').html("Name: "+d.data('name'));
            $('#tusername').html("Username: "+d.data('username'));
            $('#temail').html("Email: "+d.data('email'));
            $('#taddress').html("Address: "+d.data('address'));
            $('#tphone').html("Phone Number: (+967) "+d.data('phone'));
            $('#tgender').html("Gender: "+d.data('gender'));

            $('#showModal').modal('show');
        };

    </script>
@endsection

@endsection
