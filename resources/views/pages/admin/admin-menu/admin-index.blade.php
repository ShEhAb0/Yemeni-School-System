@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Admins</h6>

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
                    <form action="{{ route('admin.admins') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
                </div>

                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Admin  </button>
                </div>



            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Admins table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($admins->count() > 0)
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Admin Name</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Username</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">type</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">status</th>
                                        <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$admin->id}}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1 justify-content-center">
                                                <div>
                                                    <img src="{{asset('/images/profile.png/')}}" class="avatar avatar-sm me-3" alt="{{$admin->admin_name}}">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$admin->admin_name}}</h6>
                                                    <p class="text-sm text-secondary mb-0">{{$admin->email}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0">{{$admin->username}}</p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-sm font-weight-bold {{$admin->type == 0 ? 'text-primary' : 'text-success'}}">
                                                {{$admin->type == 0 ? 'Super admin' : 'Admin'}}
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-sm font-weight-bold {{$admin->status == 1 ? 'text-info' : 'text-danger'}}">
                                                {{$admin->status == 1 ? "Enabled" : "Disabled"}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a  class="text-secondary font-weight-bold text-xs  me-3" onclick="getAdmin({{$admin->id}})" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a class="text-secondary font-weight-bold text-xs" onclick="deleteAdmin({{$admin->id}})" role="button">
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                                {{$admins->render()}}
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no admins ..!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->
            <div class="modal fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="editForm" class="my-1 py-1" method="POST" action="">
                        <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <input name="fullname" id="fullname" class="form-control my-1 mb-2 " type="text" placeholder="Full Name" aria-label="Full Name">
                                <input name="username" id="username" class="form-control my-1 mb-2 " type="text" placeholder="Username" aria-label="Username">
                                <input name="email" id="email" class="form-control my-1 mb-2 " type="Email" placeholder="Email" aria-label="Email">
                                <div class="row ">
                                    <p>Gender</p>
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

                                <select name="type" class="form-select" id="type" required>
                                    <option value="0">Super Admin</option>
                                    <option value="1">Admin</option>
                                </select>

                                <select name="status" class="form-select" id="status" required>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>

                                <input name="password" class="form-control my-1 mb-2 " type="Password" placeholder="Password" aria-label="Password">
                                <input name="password_confirmation" class="form-control my-1 mb-2 " type="Password" placeholder="Confirm Password" aria-label="Confirm Password">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary" >Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="my-1 py-1" method="POST" action="/admin/admins">
                        <div class="modal-body">
                                @csrf
                                @method('POST')
                                <input name="fullname" class="form-control my-1 mb-2 " type="text" placeholder="Full Name" aria-label="Full Name" required>
                                <input name="username" class="form-control my-1 mb-2 " type="text" placeholder="Username" aria-label="Username" required>
                                <input name="email" class="form-control my-1 mb-2 " type="Email" placeholder="Email" aria-label="Email" required>
                                <div class="row ">
                                    <p>Gender</p>
                                    <div class="form-check col-5 " style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female" required>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>

                                <select name="type" class="form-select my-1 mb-2" required>
                                    <option value="" disabled selected>Select admin type</option>
                                    <option value="0">Super Admin</option>
                                    <option value="1">Admin</option>
                                </select>

                                <select name="status" class="form-select my-1 mb-2" required>
                                    <option value="" disabled selected>Select admin status</option>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>

                                <input name="password" class="form-control my-1 mb-2 " type="Password" placeholder="Password" aria-label="Password" required>
                                <input name="password_confirmation" class="form-control my-1 mb-2 " type="Password" placeholder="Confirm Password" aria-label="Confirm Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary" >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="deleteForm" method="POST" action="">
                                @csrf
                                @method('DELETE')
                                {{--                        <input type="hidden" name="term_id" id="term_id" value="">--}}
                                <p class="text-danger">Are you sure you want to delete this admin?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--Modle update-->

            @section('scripts')
                <script src="{{asset('js/axios.min.js')}}"></script>
                <script>
                    function getAdmin(id) {
                        axios({
                            method:'get',
                            url:'/admin/admins/' + id + '/edit'
                        })
                            .then(response =>{
                                if(response.status === 200){
                                    $('#editForm').attr('action','/admin/admins/'+id);
                                    $('#fullname').val(response.data.admin_name);
                                    $('#username').val(response.data.username);
                                    $('#email').val(response.data.email);
                                    $('#'+response.data.gender).attr('checked',true);
                                    $('#type').val(response.data.type);
                                    $('#status').val(response.data.status);
                                    $('#examplUpdate').modal('show');
                                }
                            })
                    }

                    function deleteAdmin(id) {
                        $('#deleteForm').attr('action','/admin/admins/'+id);
                        $('#deleteModal').modal('show');
                    }
                </script>
@endsection
@endsection
