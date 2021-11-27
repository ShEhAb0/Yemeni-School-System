@foreach($marks as $k => $mark)
    <tr>
        <td>
            <p class="text-sm font-weight-bold mb-0 text-center">{{$k+1}}</p>
        </td>
        <td>
            <p class="text-sm font-weight-bold mb-0 text-center">{{$mark->student->student_name}}</p>
        </td>
        <td class="align-middle text-center">
            <span class="text-secondary text-sm font-weight-bold">{{$mark->attendance_mark}}</span>
        </td>
        <td class="align-middle text-center">
            <span class="text-secondary text-sm font-weight-bold">{{$mark->assignments_mark}}</span>
        </td>
        <td class="align-middle text-center">
            <span class="text-secondary text-sm font-weight-bold">{{$mark->exams_mark}}</span>
        </td>
        <td class="align-middle text-center">
            <span class="text-secondary text-sm font-weight-bold">{{$mark->attendance_mark + $mark->assignments_mark + $mark->exams_mark}}%</span>
        </td>
        <td class="align-middle text-center">
            {{--                                            @if($mark->student->term_id == 1)--}}
            {{--                                            <a  class="text-secondary font-weight-bold text-xs me-3 disabled">--}}
            {{--                                                <i class="fas fa-check-circle text-muted " style="font-size: 20px;"></i>--}}
            {{--                                            </a>--}}
            {{--                                            @else--}}
            {{--                                                <a  class="text-secondary font-weight-bold text-xs  me-3" href="/teacher/mark/{{$mark->id}}/edit" title="Upgrade to the next grade">--}}
            {{--                                                <i class="fas fa-check-circle purplel-color " style="font-size: 20px;"></i>--}}
            {{--                                            </a>--}}
            {{--                                            @endif--}}
            <a class="text-secondary font-weight-bold text-xs  me-3" data-id="{{$mark->id}}"
               data-attendance="{{$mark->attendance_mark}}"
               data-assignment="{{$mark->assignments_mark}}" onclick="updateMark($(this));" role="button">
                <i class="fas fa-edit purplel-color " style="font-size: 20px;"></i>
            </a>

        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7" class="text-center">
        <div class="justify-content-center my-3" id="paginat">
        {{$marks->render()}}
        </div>
    </td>
</tr>
