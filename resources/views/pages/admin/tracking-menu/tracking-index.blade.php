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
                    <form action="{{ route('admin.tracking') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="search..." name="search">
                        </div>
                    </form>
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
                            @if($logs->count() > 0)
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Admin</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Action</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Tracking Details</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">
                                                    {{$log->admin->admin_name}} "{{$log->admin->username}}"
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$log->action}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$log->detils}}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-center">{{$log->created_at}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                                <div class="text-center my-5">
                                    {{$logs->render()}}
                                </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no logs ..!</p>
                                </div>
                            @endif
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
