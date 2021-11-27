@foreach($lessons as $lesson)
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
