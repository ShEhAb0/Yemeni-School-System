@if($assignments->count() > 0)


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Assignments table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Assignment title</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">DeadLine</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Controller</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assignments as $a)

                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$a->id}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$a->title}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$a->due_date}}</span>
                                        </td>

                                        <td class="align-middle text-center">
                                                <form id="lesson-form" method="POST" action="/" target="_blank">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="lesson" value="{{$a->id}}">
                                                    <input type="hidden" name="subject" value="{{$a->subject_id}}">
                                                    <input type="hidden" name="term" value="{{$a->term_id}}">
                                                    <input type="hidden" name="date" value="{{$a->created_at}}">
                                                    <a  class="text-secondary font-weight-bold text-xs"  data-bs-toggle="modal" href="" role="button">
                                                        <i class="fas fa-external-link-alt purplel-color" style="font-size: 20px;"></i>
                                                    </a>
                                                </form>

                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-center my-3">
                            {{$assignments->render()}}
                        </div>
                    </div>
                    @else
                        <div class="text-center text-danger py-3">
                            There are no assignments for this subject yet ..!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

