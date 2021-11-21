@if($marks->count() > 0)
    @foreach($marks as $mark)
        <tr>
            <td>
                <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}</p>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0 text-center">{{$mark->subject->subject_name}}</p>
            </td>

            <td class="align-middle text-center">
                <span class="text-secondary text-sm font-weight-bold">{{$mark->term->name}}</span>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0 text-center">{{$mark->grade->grade_name}}</p>
            </td>

            <td class="align-middle text-center">
                <span class="text-secondary text-sm font-weight-bold">{{$mark->attendance_mark}}</span>
            </td>
            <td>
                <p class="text-sm font-weight-bold mb-0 text-center">{{$mark->assignments_mark}}</p>
            </td>

            <td class="align-middle text-center">
                <span class="text-secondary text-sm font-weight-bold">{{$mark->exams_mark}}</span>
            </td>
            <td class="align-middle text-center">
                <span class="text-secondary text-sm font-weight-bold">{{$mark->attendance_mark + $mark->assignments_mark + $mark->exams_mark}}%</span>
            </td>

        </tr>
    @endforeach
@else
    <tr>
        <td class="text-danger text-center" colspan="8">There are no marks</td>
    </tr>
@endif
