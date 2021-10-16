@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Assignments</h6>
@endsection
@section('content')
    <div class="container-fluid">

        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body  mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-sm-12 col-md-6 col-xl-6 " style="margin: 0 auto;">
                    <div class="w-100 my-1">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search...">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-5 col-xl-5">
                    <div class="w-100 my-1">

                        <select class="form-select" aria-label="Select Class" id="Subject" name="Subject">
                            <option disabled="disabled" selected="selected">Select Subject</option>
                            <option value="1">Math</option>
                            <option value="2">Arabic</option>
                            <option value="3">Biolody</option>
                            <option value="4">English</option>
                            <option value="5">science</option>
                            <option value="6">chemistry</option>
                            <option value="7">History</option>

                        </select>
                    </div>
                </div>
                <br/>
                <br/>



            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Assignments table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Assignment title</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">DeadLine</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Controller</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math Algobra</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="/user/assignment/show" role="button">
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
            <!--modals-->








        </div>


    </div>
@endsection
