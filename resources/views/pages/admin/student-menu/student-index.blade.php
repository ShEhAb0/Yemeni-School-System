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
                                            <p class="text-sm font-weight-bold mb-0">{{$student->grade_code}}</p>

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
                                            <a  class="text-secondary font-weight-bold text-xs  me-3"  data-bs-toggle="modal" href="#examplUpdate" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
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


            <div class="modal  fade" id="examplUpdate" tabindex="-1" aria-labelledby="exampleModalLabelUpda" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelUpda">Update Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-2">

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
                                    <select class="form-select " aria-label="Choose Student Grade">
                                        <option value="1">First Grade</option>
                                        <option value="2">Second Grade</option>
                                        <option value="3">Three Grade</option>
                                        <option value="4">Forth Grade</option>
                                        <option value="5">Fifth Grade</option>
                                    </select>
                                </div>
                                <div class="row w_50" id="parentexsits">
                                    <p>Choose Parent</p>
                                    <select class="form-select " aria-label="Choose Parent">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-check w_50 my-1" style="align-self: flex-end;margin-left: 10px;">
                                    <input class="form-check-input" type="checkbox" name="choose" id="Choose" value="1" >
                                    <label class="form-check-label" for="Choose">
                                        Add to exsist Parents
                                    </label>
                                </div>

                                <div id="ParentInfo" class="hidden">
                                    <div class="row g-2">
                                        <p>Add new Parent</p>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control  " type="text" placeholder="Enter Parent Full Name" aria-label="Enter Parent Full Name">

                                        </div>
                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <span class="input-group-text mr-2" id="basic-addon1">@</span>
                                            <input type="email" class="form-control  " placeholder="Enter Parent Email" aria-label="Email" aria-describedby="basic-addon1">

                                        </div>

                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Parent Phone Number" aria-label="Enter Parent Phone Number">
                                        </div>

                                        <div class="input-group col-auto my-1 mb-2 w_50">
                                            <input class="form-control" type="text" placeholder="Enter Parent ID" aria-label="Enter Parent ID">
                                        </div>

                                        <div class="row w_50 col-auto my-1 mb-2 w_50" >
                                            <p>upload parent ID or Passport</p>
                                            <input class="form-control " type="file" id="formFile">
                                        </div>

                                        <div class="row w_50 col-auto my-1 mb-2 w_50" style="margin-left: 12px;">
                                            <p>upload Student last certification</p>
                                            <input class="form-control " type="file" id="formFile2" name="formFile2">
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-primary" >Save changes</button>
                        </div>
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



@endsection
