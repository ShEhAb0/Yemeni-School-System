@extends('pages.super-admin.layouts.super-admin-dashboard')
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
                    <form action="/user/teacher/" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search purplel-color" style="font-size: 20px;" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="query">
                        </div>
                    </form>
                </div>



                <div class="col-3 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">New  Teacher  </button>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Teachers Table</h6>
                        </div>




                        <!-------------------------Start Teachers Table------------------------------->

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="teachers_data_table">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                        <th class="text-secondary opacity-9 purplel-color text-center">Teacher Name</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Students Num</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Subjects Num</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Username</th>
                                        <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>




                                        <tr>
                                            <th scope="row" class="text-sm font-weight-bold text-center">
                                            </th>

                                            <td>
                                                <div class="d-flex px-2 py-1 justify-content-center">
                                                    <div >
                                                        <img src="" class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm" ></h6>
                                                        <p class="text-sm text-secondary mb-0" ></p>
                                                    </div>
                                                </div>

                                            </td>


                                            <td class="text-center" >
                                                <p class="text-sm font-weight-bold mb-0">9</p>

                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">25</p>

                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold" ></span>
                                            </td>
                                            <td class="align-middle text-center">


                                                <a  class="text-secondary font-weight-bold text-xs  me-3 "  data-bs-toggle="modal" href="#editModal" role="button" >
                                                    <i class="fas fa-edit purplel-color editTeacher" style="font-size: 20px;"></i>
                                                </a>

                                                <a  class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#deleteModal" role="button" >
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                                <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="#Schedule" role="button">
                                                    <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
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
                            <form class="row g-2" id="editForm">

                                @csrf
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" name="full_name" id="full_name" type="text" placeholder="Enter Teacher Full Name" aria-label="Enter Teacher Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" name="username" id="username" type="text" placeholder="Enter Teacher Username" aria-label="Enter Teacher Username">

                                </div>
                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" >@</span>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Teacher Email" aria-label="Email" aria-describedby="basic-addon1">

                                </div>



                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2 " id="password" name="password" type="Password" placeholder="Password" aria-label="Password">

                                </div>

                                <div class="row ">
                                    <p>Enter Teacher Gender</p>
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
                                    <input class="form-control" type="text"  name="phone" id="phone" placeholder="Enter Teacher Phone Number" aria-label="Enter Teacher Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" id="address" placeholder="Enter Teacher Address" aria-label="Enter Teacher Address">
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
            <!-------------------------End Edit Teacher------------------------------->







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
                                <form class="row g-2"  enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="input-group col-auto my-1 mb-2 w_50">
                                        <input class="form-control " required name="full_name" type="text" placeholder="Enter Teacher Full Name" aria-label="Enter Teacher Full Name">

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
                                        <input class="form-control" type="file" required id="teacher_id_or_passport" name="teacher_id_or_passport">
                                    </div>
                                    <div class="row w_50 col-auto my-1 mb-2 w_50" style="margin-left: 12px;">
                                        <p>Upload Teacher Education Certificate</p>
                                        <input class="form-control" type="file" required id="teacher_education_certificate" name="teacher_education_certificate">
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
                            <form class="my-1 py-1" id="deleteForm">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="">


                                <p>Are you sure you want to delete this teacher?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary" >Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-------------------------End Delete Teacher------------------------------->

            </div>
        </div>

        @endsection

        @section('scripts')




            <script>
                var editModal = document.getElementById('#editModal')


                $('#editModal').on('show.bs.modal' , function (event){


                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var full_name = button.data('full_name')
                    var username = button.data('username')
                    var email = button.data('email')
                    var password = button.data('password')
                    var phone = button.data('phone')
                    var address = button.data('address')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #full_name').val(full_name);
                    modal.find('.modal-body #username').val(username);
                    modal.find('.modal-body #email').val(email);
                    modal.find('.modal-body #password').val(password);
                    modal.find('.modal-body #phone').val(phone);
                    modal.find('.modal-body #address').val(address);
                })
                $('#deleteModal').on('show.bs.modal' , function (event){


                    var button = $(event.relatedTarget)
                    var id = button.data('id')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);

                })

            </script>


@endsection
