<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Attendances table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if($attendances->count() > 0)

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Lesson Title </th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Creation Date</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances->unique('lesson_id') as $attendance)
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">{{$attendance->lessonsAttendances->title}}</p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{$attendance->lesson_creation_date}}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a  class="text-secondary font-weight-bold text-xs" data-id="{{$attendance->lesson_id}}" onclick="showAttend($(this))" role="button">
                                            <i class="far fa-id-card purplel-color" style="font-size: 20px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-center my-3">
                            {{$attendances->render()}}
                        </div>
                    @else
                        <div class="text-center">
                            <p class="h5 text-danger">There are no attendances yet..!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
