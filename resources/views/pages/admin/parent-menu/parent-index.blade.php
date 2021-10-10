@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Parents</h6>

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
                        <input type="text" id="search" class="form-control" placeholder="search...">
                    </div>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Parent</button>
                </div>

            </div>
        </div>


        <!-------------------------Start Parents Table------------------------------->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Parents table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($parents->count() > 0)

                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Parent Name</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Students Number</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">ID</th>
                                        <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($parents as $parent)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$parent->id}}</p>
                                            </td>
                                            <td >
                                                <div class="d-flex px-2 py-1 justify-content-center">
                                                    <div>
                                                        <img src="{{asset('/images/parent_id_passport/'.$parent->parent_id_or_passport)}}" class="avatar avatar-sm me-3" >
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$parent->parent_name}}</h6>
                                                        <p class="text-sm text-secondary mb-0">{{$parent->email}}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0"></p>

                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold">{{$parent->username}}</span>
                                            </td>
                                            <td class="align-middle text-center">


                                                <a  class="text-secondary font-weight-bold text-xs  me-3"  onclick="getParents({{$parent->id}});"  role="button">
                                                    <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                </a>

                                                <a class="text-secondary font-weight-bold text-xs me-3" onclick="deleteParents({{$parent->id}});" role="button">
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                                <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#" role="button">
                                                    <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no parents yet..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------End Parents Table------------------------------->














            <!-------------------------Start New Parent    ------------------------------->


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Parent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2" action="/admin/parents" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('POST')

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" required type="text" name="parent_name" placeholder="Enter Parent Full Name" aria-label="Enter Parent Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" required name="username" placeholder="Enter Parent Username" aria-label="Enter Parent Username">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" id="basic-addon1">@</span>
                                    <input type="email" class="form-control  " required name="email" placeholder="Enter Parent Email" aria-label="Email" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2" required name="password" type="Password" placeholder="Password" aria-label="Password">

                                </div>
                                <div class="row ">
                                    <p>Enter Parent Gender</p>
                                    <div class="form-check col-5 "  style="margin-left: 20px;">
                                        <input class="form-check-input"  type="radio" name="gender" id="exampleRadios12" value="male" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input"  type="radio" name="gender" id="exampleRadios22" value="female">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>


                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="phone" required placeholder="Enter Parent Phone Number" aria-label="Enter Parent Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" required placeholder="Enter Student Address" aria-label="Enter Student Address">
                                </div>
                                <div class="row ">
                                    <div class="row w_50 col-auto my-1 mb-2 w_50" >
                                        <p>upload parent ID or Passport</p>
                                        <input class="form-control" type="file" id="parent_id_or_passport" required name="parent_id_or_passport">
                                    </div>
                                </div>


                                <div class="row w_50 hidden" id="parentexsits2" >
                                    <p>Choose Student </p>
                                    <select class="form-select my-1 mb-2" name="user" required>
                                        @if($users->count() > 0)
                                            <option value="" disabled selected>Select the student</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->student_name}}</option>
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
                                <div class="form-check w_50 my-1" style="align-self: flex-end;margin-left: 10px;">
                                    <input class="form-check-input" type="checkbox" name="choose" id="Choose2" value="1" >
                                    <label class="form-check-label" for="Choose2" checked>
                                        Add to exist Student
                                    </label>
                                </div>


                                <div id="ParentInfo2" class="my-1" >
                                    <div class="row g-2 my-1">
                                        <p>Add new Student</p>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Student Full Name" aria-label="Enter Student Full Name">

                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <span class="input-group-text mr-2" id="basic-addon1">@</span>
                                            <input type="email" class="form-control  " placeholder="Enter Student Email" aria-label="Email" aria-describedby="basic-addon1">

                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Student Phone Number" aria-label="Enter Student Phone Number">
                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Student ID" aria-label="ID">
                                        </div>
                                        <div class="row w_50 ">
                                            <p>Choose Student Gender</p>
                                            <div class="form-check col-5 " style="margin-left: 20px;">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios12" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-5">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios22" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row w_50 ">
                                            <p>Choose Student Grade</p>
                                            <select class="form-select" aria-label="Choose Student Grade">
                                                <option value="1">First Grade</option>
                                                <option value="2">Second Grade</option>
                                                <option value="3">Three Grade</option>
                                                <option value="4">Forth Grade</option>
                                                <option value="5">Fifth Grade</option>
                                            </select>
                                        </div>


                                    </div>
                                    <br/>
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" >Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------End New Parent------------------------------->







            <!-------------------------Start Edit Parent------------------------------->
            <div class="modal  fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Parent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2"  id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')


                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" required type="text" name="parent_name" placeholder="Enter Parent Full Name" aria-label="Enter Parent Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" required name="username" placeholder="Enter Parent Username" aria-label="Enter Parent Username">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" id="basic-addon1">@</span>
                                    <input type="email" class="form-control  " required name="email" placeholder="Enter Parent Email" aria-label="Email" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2" required name="password" type="Password" placeholder="Password" aria-label="Password">

                                </div>
                                <div class="row ">
                                    <p>Enter Parent Gender</p>
                                    <div class="form-check col-5 "  style="margin-left: 20px;">
                                        <input class="form-check-input"  type="radio" name="gender" id="exampleRadios12" value="male" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input"  type="radio" name="gender" id="exampleRadios22" value="female">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>


                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="phone" required placeholder="Enter Parent Phone Number" aria-label="Enter Parent Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" required placeholder="Enter Student Address" aria-label="Enter Student Address">
                                </div>
                                <div class="row ">
                                    <div class="row w_50 col-auto my-1 mb-2 w_50" >
                                        <p>upload parent ID or Passport</p>
                                        <input class="form-control" type="file" id="parent_id_or_passport" required name="parent_id_or_passport">
                                    </div>
                                </div>


                                <div class="row w_50 hidden" id="parentexsits2" >
                                    <p>Choose Student </p>
                                    <select class="form-select my-1 mb-2" name="user" required>
                                        @if($users->count() > 0)
                                            <option value="" disabled selected>Select the student</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->student_name}}</option>
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
                                <div class="form-check w_50 my-1" style="align-self: flex-end;margin-left: 10px;">
                                    <input class="form-check-input" type="checkbox" name="choose" id="Choose2" value="1" >
                                    <label class="form-check-label" for="Choose2" checked>
                                        Add to exist Student
                                    </label>
                                </div>
                                <div class="form-check w_50 my-1" style="align-self: flex-end;margin-left: 10px;">
                                    <input class="form-check-input" type="checkbox" name="choose" id="Choose" value="1" >
                                    <label class="form-check-label" for="Choose2" checked>
                                        Add to exsist Student
                                    </label>
                                </div>


                                <div id="ParentInfo" class="my-1" >
                                    <div class="row g-2 my-1">
                                        <p>Add new Student</p>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control  " type="text" placeholder="Enter Student Full Name" aria-label="Enter Student Full Name">

                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <span class="input-group-text mr-2" id="basic-addon1">@</span>
                                            <input type="email" class="form-control  " placeholder="Enter Student Email" aria-label="Email" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Student Phone Number" aria-label="Enter Student Phone Number">
                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Student ID" aria-label="ID">
                                        </div>
                                        <div class="row w_50 ">
                                            <p>Choose Student Gender</p>
                                            <div class="form-check col-5 " style="margin-left: 20px;">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios12" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-5">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios22" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row w_50 ">
                                            <p>Choose Student Grade</p>
                                            <select class="form-select" aria-label="Choose Student Grade">
                                                <option value="1">First Grade</option>
                                                <option value="2">Second Grade</option>
                                                <option value="3">Three Grade</option>
                                                <option value="4">Forth Grade</option>
                                                <option value="5">Fifth Grade</option>
                                            </select>
                                        </div>


                                    </div>
                                    <br/>
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
            <!-------------------------End Edit Parent------------------------------->
        </div>
    </div>



    <!-------------------------Start Delete Parent------------------------------->


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Parent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="my-1 py-1" id="deleteForm">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" id="id" value="">


                        <p>Are you sure you want to delete this parent?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-primary" >Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-------------------------End Delete Parent------------------------------->


@endsection



@section('scripts')



    <script>
        //ParentInfo
        //Choose
        $(function () {

            $('#Choose').click(function (e) {

                $('#ParentInfo').toggle();
                $('#parentexsits').toggle();

            });
            $('#Choose2').click(function (e) {

                $('#ParentInfo2').toggle();
                $('#parentexsits2').toggle();


            });
        });
    </script>


    <script>
        var editModal = document.getElementById('#editModal')


        $('#editModal').on('show.bs.modal' , function (event){


            var button = $(event.relatedTarget)
            var id = button.data('id')
            var full_name = button.data('full_name')
            var username = button.data('username')
            var email = button.data('email')
            var password = button.data('password')
            var gender = button.data('gender')
            var phone = button.data('phone')
            var address = button.data('address')
            var parent_id_or_passport = button.data('parent_id_or_passport')
            var student_id = button.data('student_id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #full_name').val(full_name);
            modal.find('.modal-body #username').val(username);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #password').val(password);
            modal.find('.modal-body #gender').val(gender);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #address').val(address);
            modal.find('.modal-body #parent_id_or_passport').val(parent_id_or_passport);
            modal.find('.modal-body #student_id').val(student_id);

        })

        $('#deleteModal').on('show.bs.modal' , function (event){


            var button = $(event.relatedTarget)
            var id = button.data('id')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);

        })

    </script>


@endsection
