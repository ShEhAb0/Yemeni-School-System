@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Tracking</h6>

    </div>
@endsection
@section('content')

    <div class="container-fluid">
        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control blue-color" placeholder="Type here...">
                    </div>
                </div>


            </div>
        </div>
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Tracking table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Tracking title</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Tracking Details</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">ID</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Date</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center"></p>

                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold"></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-bold"></span>
                                            </td>
                                            <td class="align-middle text-center">


                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
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
            <!--end-->
            <ul>

            </ul>
        </div>
    </div>



@endsection
