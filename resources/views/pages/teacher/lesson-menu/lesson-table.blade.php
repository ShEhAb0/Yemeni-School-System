<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Lessons table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if($lessons->count() > 0)

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Lesson title</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Lesson status</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Publishing Date</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                </tr>
                                </thead>
                                @foreach($lessons as $lesson)

                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$lesson->id}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$lesson->title}}</p>
                                        </td>



                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center {{$lesson->status == 1 ? "text-danger" : "text-info"}}">
                                                {{$lesson->status == 1 ? "New" : "Published"}}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$lesson->created_at}}</span>
                                        </td>
                                        <td class="align-middle text-center">

                                            <a  class="text-secondary font-weight-bold text-xs  me-3"    role="button"   onclick="javascript:getLesson({{$lesson->id}})">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a  class="text-secondary font-weight-bold text-xs me-3" role="button" onclick="deleteLesson({{$lesson->id}});">
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>
                                            <a  class="text-secondary font-weight-bold text-xs me-3"  data-bs-toggle="modal" href="#attendance" role="button">
                                                <i class="far fa-id-card purplel-color" style="font-size: 20px;"></i>
                                            </a>

                                            <a  class="text-secondary font-weight-bold text-xs  "  href="/teacher/lesson/{{$lesson->id}}" role="button">
                                                <i class="fas fa-external-link-alt blue-color" style="font-size: 20px;"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-center my-3">
                            {{$lessons->render()}}
                        </div>
                    @else
                        <div class="text-center">
                            <p class="h5 text-danger">There are no lessons yet..!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end-->
</div>
