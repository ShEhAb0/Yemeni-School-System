@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Teachers</h6>

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
                    <form action="{{ route('admin.teachers') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
                </div>



                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Teacher  </button>
                </div>
            </div>
        </div>



        <!-------------------------Start Teachers Table------------------------------->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Teachers Table</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            @if($teachers->count() > 0)

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0" id="teachers_data_table">
                                        <thead>
                                        <tr>
                                            <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                            <th class="text-secondary opacity-9 purplel-color text-center">Teacher Name</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Subjects Num</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Username</th>
                                            <th class="text-secondary purplel-color opacity-9 text-center">Status</th>
                                            <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($teachers as $teacher)
                                            <tr>
                                                <th scope="row" class="text-sm font-weight-bold text-center">{{$teacher->id}}
                                                </th>

                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div >
                                                            <img src="{{asset('/images/profile.png/')}}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm" >{{$teacher['teacher_name']}}</h6>
                                                            <p class="text-sm text-secondary mb-0" >{{$teacher['email']}}</p>
                                                        </div>
                                                    </div>

                                                </td>



                                                <td class="text-center">
                                                    <p class="text-sm font-weight-bold mb-0">{{count($teacher->subjects)}}</p>

                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-sm font-weight-bold" >{{$teacher['username']}}</span>
                                                </td>
                                                <td class="text-sm font-weight-bold mb-0 text-center {{$teacher->status == 0 ? 'text-danger' : 'text-info'}}">
                                                    {{$teacher->status == 1 ? 'Active' : 'Suspend'}}
                                                </td>
                                                <td class="align-middle text-center">


                                                    <a  class="text-secondary font-weight-bold text-xs  me-3 "  role="button"  onclick="getTeacher({{$teacher->id}});">
                                                        <i class="fas fa-edit purplel-color editTeacher" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a  class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip"  role="button" onclick="deleteTeacher({{$teacher->id}});">
                                                        <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                    </a>
                                                    <a  class="text-secondary font-weight-bold text-xs" data-name="{{$teacher->teacher_name}}" data-username="{{$teacher->username}}" data-email="{{$teacher->email}}" data-gender="{{$teacher->gender}}" data-phone="{{$teacher->phone}}" data-address="{{$teacher->address}}" onclick="showTeacher($(this));" role="button">
                                                        <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center my-5">
                                    {{$teachers->render()}}

                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no teachers ..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-------------------------End Teachers Table------------------------------->



            <!-------------------------Start Edit Teacher------------------------------->

            <div class="modal  fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Teacher</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2" method="POST" id="editForm" action="">

                                @csrf
                                @method('PUT')
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control " required name="teacher_name" id="teacher_name"
                                           type="text" placeholder="Enter Teacher Full Name" aria-label="Enter Teacher Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control " required name="username" type="text" id="username" placeholder="Enter Teacher Username" aria-label="Enter Teacher Username">


                                </div>
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" >@</span>
                                    <input type="email" class="form-control  " required name="email" id="email" placeholder="Enter Teacher Email" aria-label="Email" aria-describedby="basic-addon1">

                                </div>



                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2 "  name="password" id="password" type="Password" placeholder="Password" aria-label="Password">

                                </div>

                                <div class="row ">
                                    <p>Enter Teacher Gender</p>
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
                                    <input class="form-control" type="text" name="phone" id="phone" required placeholder="Enter Teacher Phone Number" aria-label="Enter Teacher Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" id="address" required placeholder="Enter Teacher Address" aria-label="Enter Teacher Address">
                                </div>

                                <div class="row w_50 col-auto my-1 mb-2 w_50" >
                                    <p>Upload Teacher ID or Passport</p>
                                    <input class="form-control" type="file"  id="teacher_id_or_passport" accept="image/png, image/gif, image/jpeg" name="teacher_id_or_passport" >
                                </div>
                                <div class="row w_50 col-auto my-1 mb-2 w_50" style="margin-left: 12px;">
                                    <p>Upload Teacher Education Certificate</p>
                                    <input class="form-control" type="file"  id="teacher_education_certificate" name="teacher_education_certificate" accept="image/png, image/gif, image/jpeg" >
                                </div>

                                <select name="status" id="status" class="form-select" required>
                                    <option value="" disabled selected>Choose teacher status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Suspend</option>
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


            <!-------------------------Start New Teacher------------------------------->
            <div class="jumbotron">


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Teacher</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-2" action="/admin/teachers" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    @method('POST')

                                    <div class="input-group col-auto my-1 mb-2 w_50">
                                        <input class="form-control " required name="teacher_name" type="text" placeholder="Enter Teacher Full Name" aria-label="Enter Teacher Full Name">

                                    </div>

                                    <div class="input-group col-auto my-1 mb-2 w_50">
                                        <input class="form-control " required name="username" type="text" placeholder="Enter Teacher Username" aria-label="Enter Teacher Username">


                                    </div>
                                    <div class="input-group col-auto my-1 mb-2 w_50">
                                        <span class="input-group-text mr-2" >@</span>
                                        <input type="email" class="form-control  " required name="email" placeholder="Enter Teacher Email" aria-label="Email" aria-describedby="basic-addon1">

                                    </div>



                                    <div class="input-group col-auto my-1 mb-2 w_50">
                                        <input class="form-control my-1 mb-2 " required name="password" type="Password" placeholder="Password" aria-label="Password">

                                    </div>

                                    <div class="row ">
                                        <p>Enter Teacher Gender</p>
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
                                        <input class="form-control" type="text" name="phone" required placeholder="Enter Teacher Phone Number" aria-label="Enter Teacher Phone Number">
                                    </div>

                                    <div class="input-group col-auto my-1 mb-2 w_50">
                                        <input class="form-control" type="text" name="address" required placeholder="Enter Teacher Address" aria-label="Enter Teacher Address">
                                    </div>

                                    <div class="row w_50 col-auto my-1 mb-2 w_50" >
                                        <p>Upload Teacher ID or Passport</p>
                                        <input class="form-control" type="file" required id="teacher_id_or_passport" accept="image/png, image/gif, image/jpeg" name="teacher_id_or_passport">
                                    </div>
                                    <div class="row w_50 col-auto my-1 mb-2 w_50" style="margin-left: 12px;">
                                        <p>Upload Teacher Education Certificate</p>
                                        <input class="form-control" type="file" required id="teacher_education_certificate" name="teacher_education_certificate" accept="image/png, image/gif, image/jpeg">
                                    </div>

                                    <select name="status" class="form-select" required>
                                        <option value="" disabled selected>Choose teacher status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Suspend</option>
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
            <!-------------------------End New Teacher------------------------------->




            <!-------------------------Start Delete Teacher------------------------------->


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="my-1 py-1" id="deleteForm" action="" method="POST">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}



                                <p class="text-danger">Are you sure you want to delete this teacher?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-------------------------End Delete Teacher------------------------------->

            </div>
        </div>
        @section('scripts')

            <script src="{{asset('js/axios.min.js')}}"></script>
            <script>
                function getTeacher(id) {
                    axios({
                        method:'get',
                        url:'/admin/teachers/' + id + '/edit'
                    })
                        .then(response =>{
                            if(response.status === 200){
                                $('#editForm').attr('action','/admin/teachers/'+id);
                                $('#teacher_name').val(response.data.teacher_name);
                                $('#username').val(response.data.username);

                                $('#email').val(response.data.email);

                                $('#'+response.data.gender).attr('checked',true);                                $('#phone').val(response.data.phone);
                                $('#address').val(response.data.address);
                                // $('#teacher_id_or_passport').val(response.data.teacher_id_or_passport);
                                // $('#teacher_education_certificate').val(response.data.teacher_education_certificate);
                                $('#status').val(response.data.status);
                                $('#editModal').modal('show');
                            }
                        })
                }

                function deleteTeacher(id) {
                    $('#deleteForm').attr('action','/admin/teachers/'+id);
                    $('#deleteModal').modal('show');
                }


            </script>

    <script>


        function showTeacher(d){
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


