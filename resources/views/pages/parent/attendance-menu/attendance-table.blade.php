@if($attendances->count() > 0)
    <div class="container-fluid py-3" id="attendanceData">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Total Subject's Attendance</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9  text-center text-sm">Total Lessons
                                    </th>
                                    <th class="text-secondary purplel-color opacity-9  text-center text-sm">Total absence
                                    </th>
                                    <th class="text-secondary purplel-color opacity-9  text-center text-sm">Total presence
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center" id="totalLessons">{{$total}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center" id="totalAbsence">{{$absence}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center" id="totalPresence">{{$presence}}</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="attendanceTable">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Attendance table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Lesson Title</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Date</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center">Attendance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $attendance)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$attendance->id}}</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$attendance->lessonsAttendances->title}}</p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$attendance->view_date}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input" style="float: none;" type="checkbox" {{$attendance->status == 1 ? 'checked' : ''}} disabled>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container-fluid py-1" id="nothing">
        <div class="card my-2">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="text-center py-3">
                    <p class="h4 text-danger">There are no attendance for this subject yet..!</p>
                </div>
            </div>
        </div>
    </div>
@endif
