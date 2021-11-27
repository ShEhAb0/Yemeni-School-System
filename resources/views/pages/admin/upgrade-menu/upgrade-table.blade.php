@if($marks->count() > 0)
    <table class="table align-items-center mb-0">
    <thead>
    <tr>
        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
        <th class="text-secondary purplel-color opacity-9 text-center ">Student Name</th>
        <th class="text-secondary purplel-color opacity-9  text-center">Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($marks as $mark)
    <tr>
        <td>
            <p class="text-sm font-weight-bold mb-0 text-center">{{$loop->iteration}}</p>
        </td>
        <td>
            <p class="text-sm font-weight-bold mb-0 text-center">{{$mark[$loop->index]->student->student_name}}</p>
        </td>
        <td class="align-middle text-center">
            <span class="text-secondary text-sm font-weight-bold">{{$mark->sum('total')}}</span>
        </td>
    </tr>
        @endforeach
    </tbody>
</table>
@else
 <div class="text-center text-danger">
     <p>No data</p>
 </div>
    @endif
