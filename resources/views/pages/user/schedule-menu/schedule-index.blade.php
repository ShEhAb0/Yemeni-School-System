@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Schedule</h6>
@endsection
@section('content')

    <div class="container-fluid">
        <br/>
        <br/>
        <div class="row mb-3">
            <div class="card mb-3">
                <div class="card-body px-0 pt-0 pb-2">
                    @if($schedules->count() > 0)
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary opacity-9 purplel-color text-center">#</th>
                                    <th class="text-secondary opacity-9 purplel-color text-center">Term Name</th>
                                    <th class="text-secondary opacity-9 purplel-color text-center">Schedule</th>
                                    <th class="text-secondary opacity-9 purplel-color text-center">Controllers</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}   </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$schedule->term->name}}</p>
                                        </td>
                                        <td class="text-center">
                                            <img src="{{asset('/images/grade_schedule/'.$schedule->file_name)}}" class="img-thumbnail" width="200" height="200" alt="{{$schedule->file_name}}">
                                        </td>
                                        <td class="align-middle text-center">
                                            <a  class="text-secondary font-weight-bold text-xs" href="{{asset('/images/grade_schedule/'.$schedule->file_name)}}" role="button" target="_blank">
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
                            <p class="h5 text-danger">There are no schedules yet..!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
