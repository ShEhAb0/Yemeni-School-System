<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Assignments table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if($assignments->count() > 0)

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Assignment
                                        title
                                    </th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">DeadLine
                                    </th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Status
                                    </th>
                                    <th class="text-secondary purplel-color opacity-9 text-center">Controllers
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assignments as $assignment)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$assignment->id}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$assignment->title}}</p>
                                        </td>


                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{date('Y-m-d' , strtotime($assignment->due_date))}}</span>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center {{$assignment->status == 1 ? "text-danger" : "text-info"}}">
                                                {{$assignment->status == 1 ? "New" : "Published"}}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">

                                            <a class="text-secondary font-weight-bold text-xs  me-3"
                                               onclick="javascript:getAssignment({{$assignment->id}})" role="button">
                                                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
                                            </a>

                                            <a
                                                class="text-secondary font-weight-bold text-xs me-3"
                                                data-toggle="tooltip"onclick="deleteAssignment({{$assignment->id}}); "  role="button" >
                                                <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                            </a>
                                            <a class="text-secondary font-weight-bold text-xs"
                                               href="/teacher/assignment/{{$assignment->id}}" role="button">
                                                <i class="fas fa-external-link-alt purplel-color"
                                                   style="font-size: 20px;"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {{$assignments->render()}}
                        </div>
                    @else
                        <div class="text-center">
                            <p class="h5 text-danger">There are no assignments yet..!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
