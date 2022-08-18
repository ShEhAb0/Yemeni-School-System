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
                    <form action="{{ route('admin.parents') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
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
                                        <th class="text-secondary purplel-color opacity-9 text-center">Username</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Status</th>

                                        <th class="text-secondary opacity-9  purplel-color text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($parents as $parent)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}  </p>
                                            </td>
                                            <td >
                                                <div class="d-flex px-2 py-1 justify-content-center">
                                                    <div>
                                                        <img src="{{asset('/images/profile.png/')}}" class="avatar avatar-sm me-3" >
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$parent->parent_name}}</h6>
                                                        <p class="text-sm text-secondary mb-0">{{$parent->email}}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">{{count($parent->students)}}</p>

                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold">{{$parent->username}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold {{$parent->status == 1 ? "text-info" : "text-danger"}}">
                                                        {{$parent->status == 1 ? "Active" : "Suspend"}}</span>
                                            </td>
                                            <td class="align-middle text-center">


                                                <a  class="text-secondary font-weight-bold text-xs  me-3"  onclick="getParents({{$parent->id}});"  role="button">
                                                    <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                                </a>

                                                <a class="text-secondary font-weight-bold text-xs me-3" onclick="deleteParents({{$parent->id}});" role="button">
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                                </a>
                                                <a  class="text-secondary font-weight-bold text-xs" data-name="{{$parent->parent_name}}" data-username="{{$parent->username}}" data-email="{{$parent->email}}" data-gender="{{$parent->gender}}" data-phone="{{$parent->phone}}" data-address="{{$parent->address}}" onclick="showParent($(this));" role="button">
                                                    <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                <div class="text-center my-5">
                                    {{$parents->render()}}

                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no parents ..!</p>
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

                                <div class="row">
                                    @if($users->count() > 0)

                                                <div class="multiselect row w_50 " style="width: 150px;" >
                                                    <div class="selectBox" onclick="showCheckboxes()" style="position: relative;" >
                                                        <select style=" width: 100%;" aria-label="select example"  required  >
                                                            <option>Select Student</option>
                                                        </select>
                                                        <div class="overSelect" style="position: absolute;
                                                  left: 0;
                                                  right: 0;
                                                  top: 0;
                                                  bottom: 0;"
                                                        ></div>
                                                    </div>
                                                    <div id="checkboxes" style="display: none;
                                                 border: 1px #dadada solid;">
                                                        @foreach($users as $user)
                                                            <label for="{{$user->id}}" style=" display: block; margin-right: 20px;">
                                                                <input type="checkbox" id="{{$user->id}}" name="user[]" style="margin-right: 10px;" value="{{$user->id}}" />{{$user->student_name}}</label>
                                                        @endforeach
                                                    </div>
                                                </div>

                                        @endif
                                    </div>




                                {{--                            @if($users->count() > 0)--}}
{{--                                <div class="row w_50" >--}}
{{--                                    <p>Choose Student </p>--}}
{{--                                    <select class="form-control select-checkbox" size="6" aria-label="select example" multiple="true" name="user" required >--}}
{{--                                        <optgroup >--}}
{{--                                            <option value="" disabled selected>Select the student</option>--}}
{{--                                            @foreach($users as $user)--}}
{{--                                                <option value="{{$user->id}}">{{$user->student_name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </optgroup>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                @endif--}}


                                <p>Choose Parent Status</p>

                                <select name="status" class="form-select"  required>
                                    <option value="" disabled selected>Choose parent status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Suspend</option>
                                </select>
{{--                                <div class="form-check w_50 my-1" style="align-self: flex-end;margin-left: 10px;">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="choose" id="Choose2" value="1" >--}}
{{--                                    <label class="form-check-label" for="Choose2" checked>--}}
{{--                                        Add to exist Student--}}
{{--                                    </label>--}}
{{--                                </div>--}}


{{--                                <div id="ParentInfo2" class="my-1" >--}}
{{--                                    <div class="row g-2 my-1">--}}
{{--                                        <p>Add new Student</p>--}}
{{--                                        <div class="input-group col-auto my-1 mb-2 w_50">--}}
{{--                                            <input class="form-control" type="text" placeholder="Enter Student Full Name" aria-label="Enter Student Full Name">--}}

{{--                                        </div>--}}
{{--                                        <div class="input-group col-auto my-1 mb-2 w_50">--}}
{{--                                            <span class="input-group-text mr-2" id="basic-addon1">@</span>--}}
{{--                                            <input type="email" class="form-control  " placeholder="Enter Student Email" aria-label="Email" aria-describedby="basic-addon1">--}}

{{--                                        </div>--}}
{{--                                        <div class="input-group col-auto my-1 mb-2 w_50">--}}
{{--                                            <input class="form-control" type="text" placeholder="Enter Student Phone Number" aria-label="Enter Student Phone Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="input-group col-auto my-1 mb-2 w_50">--}}
{{--                                            <input class="form-control" type="text" placeholder="Enter Student ID" aria-label="ID">--}}
{{--                                        </div>--}}
{{--                                        <div class="row w_50 ">--}}
{{--                                            <p>Choose Student Gender</p>--}}
{{--                                            <div class="form-check col-5 " style="margin-left: 20px;">--}}
{{--                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios12" value="option1" checked>--}}
{{--                                                <label class="form-check-label" for="exampleRadios1">--}}
{{--                                                    Male--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-check col-5">--}}
{{--                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios22" value="option2">--}}
{{--                                                <label class="form-check-label" for="exampleRadios2">--}}
{{--                                                    Female--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row w_50 ">--}}
{{--                                            <p>Choose Student Grade</p>--}}
{{--                                            <select class="form-select" aria-label="Choose Student Grade">--}}
{{--                                                <option value="1">First Grade</option>--}}
{{--                                                <option value="2">Second Grade</option>--}}
{{--                                                <option value="3">Three Grade</option>--}}
{{--                                                <option value="4">Forth Grade</option>--}}
{{--                                                <option value="5">Fifth Grade</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}


{{--                                    </div>--}}
{{--                                    <br/>--}}
{{--                                </div>--}}



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
                                                        <h6 class="mb-0 ">Parent Information</h6>
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
                                    <input class="form-control" required type="text" name="parent_name" id="parent_name" placeholder="Enter Parent Full Name" aria-label="Enter Parent Full Name">

                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" required name="username" id="username" placeholder="Enter Parent Username" aria-label="Enter Parent Username">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <span class="input-group-text mr-2" id="basic-addon1">@</span>
                                    <input type="email" class="form-control  " required name="email" id="email" placeholder="Enter Parent Email" aria-label="Email" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control my-1 mb-2"  name="password" type="Password" id="password" placeholder="Password" aria-label="Password">

                                </div>
                                <div class="row ">
                                    <p>Enter Parent Gender</p>
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
                                    <input class="form-control" type="text" name="phone" id="phone" required placeholder="Enter Parent Phone Number" aria-label="Enter Parent Phone Number">
                                </div>

                                <div class="input-group col-auto my-1 mb-2 w_50">
                                    <input class="form-control" type="text" name="address" id="address" required placeholder="Enter Student Address" aria-label="Enter Student Address">
                                </div>
                                <div class="row ">
                                    <div class="row w_50 col-auto my-1 mb-2 w_50" >
                                        <p>upload parent ID or Passport</p>
                                        <input class="form-control" type="file" id="parent_id_or_passport"  name="parent_id_or_passport">
                                    </div>
                                </div>


                                <div class="row ">
                                    @if($users->count() > 0)

                                            <div class="multiselect row w_50 " style="width: 150px;" >
                                                <div class="selectBox" onclick="editCheckboxes()" style="position: relative;" >
                                                    <select style=" width: 100%;" aria-label="select example"  >
                                                        <option>Select Student</option>
                                                    </select>
                                                    <div class="overSelect" style="position: absolute;
                                                  left: 0;
                                                  right: 0;
                                                  top: 0;
                                                  bottom: 0;"
                                                    ></div>
                                                </div>
                                                <div id="editcheckboxes" style="display: none;
                                                 border: 1px #dadada solid;">
                                                    @foreach($users as $user)
                                                        <label for="st{{$user->id}}" style=" display: block; margin-right: 20px;">
                                                            <input type="checkbox" id="st{{$user->id}}" name="user[]" style="margin-right: 10px;" value="{{$user->id}}" class="stu"/>
                                                            {{$user->student_name}}</label>
                                                    @endforeach
                                                </div>
                                            </div>

                                    @endif
                                </div>



                                {{--                        <!----}}
{{--                                @if($users->count() > 0)--}}
{{--                                    <div class="row w_50 "  >--}}
{{--                                        <p>Choose Student </p>--}}
{{--                                        <select class="form-control " size="6" aria-label="select example" multiple="" name="user" required >--}}
{{--                                            <optgroup >--}}
{{--                                                <option class="form-control select-checkbox" value="" disabled selected>Select the student</option>--}}
{{--                                                @foreach($users as $user)--}}
{{--                                                    <option value="{{$user->id}}">{{$user->student_name}}</option>--}}
{{--                                                @endforeach--}}

{{--                                            </optgroup>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                                -->--}}

                                    <br>
                                <p>Choose Parent Status</p>

                                <select name="status" class="form-select" id="status"  required>
                                    <option value="" disabled selected>Choose parent status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Suspend</option>
                                </select>


                                <!--
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
                                                                                          -->


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




    <!-------------------------Start Delete Parent------------------------------->



    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Parent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="my-1 py-1" id="deleteForm" action="" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}

                        <p class="text-danger">Are you sure you want to delete this parent?</p>
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


        <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        function getParents(id) {
            $('.stu').prop('checked',false);
            axios({
                method:'get',
                url:'/admin/parents/' + id + '/edit'
            })
                .then(response =>{
                    if(response.status === 200){
                        var students = response.data.students;

                        $('#editForm').attr('action','/admin/parents/'+id);
                        $('#parent_name').val(response.data.parent.parent_name);
                        $('#username').val(response.data.parent.username);
                        $('#email').val(response.data.parent.email);
                        $('#'+response.data.parent.gender).attr('checked',true);
                        $('#phone').val(response.data.parent.phone);
                        $('#address').val(response.data.parent.address);
                        $('#user').val(response.data.parent.user);
                        $('#status').val(response.data.parent.status);
                        students.forEach(function (item){
                            $('#st'+item.user_id).prop('checked',true);
                        })

                        $('#editModal').modal('show');
                    }
                })
        }

        function deleteParents(id) {
            $('#deleteForm').attr('action','/admin/parents/'+id);
            $('#deleteModal').modal('show');
        }
    </script>
    <script>


        function showParent(d){
            $('#tname').html("Name: "+d.data('name'));
            $('#tusername').html("Username: "+d.data('username'));
            $('#temail').html("Email: "+d.data('email'));
            $('#taddress').html("Address: "+d.data('address'));
            $('#tphone').html("Phone Number: (+967) "+d.data('phone'));
            $('#tgender').html("Gender: "+d.data('gender'));

            $('#showModal').modal('show');
        };
    </script>
<script>
        var expanded = false;

        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }



    </script>

    <script>
        var expanded = false;

        function editCheckboxes() {
            var editcheckboxes = document.getElementById("editcheckboxes");
            if (!expanded) {
                editcheckboxes.style.display = "block";
                expanded = true;
            } else {
                editcheckboxes.style.display = "none";
                expanded = false;
            }
        }



    </script>

@endsection
