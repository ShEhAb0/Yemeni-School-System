@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Exams</h6>
@endsection
@section('content')

    <div class="container-fluid">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible text-white fade show mx-4 mt-4" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
        @endif
        <br/>
        <br/>
        <br/>
        <br/>

        <!--page apper if there is no Exame Today-->
        <!-- <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
         <div class="row gx-4">
           <div class="col-12 text-center">
         <div class="noExam">

         </div>
         <div class="text-center">
          <h2>There is no Exame Today..</h2>
         </div>
                 </div>
                 </div>
                 </div> -->


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Exams Schedule </h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($exams->count() > 0)
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Subject Name</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Teacher Name</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Duration</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Exam Date Time</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Controller</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $k => $exam)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$k+1}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">{{$exam->subjectsExams->subject_name}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$exam->teachersExams->teacher_name}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$exam->duration_m}} Mins</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">{{$exam->exam_time}}</span>
                                        </td>
                                        <td class="align-middle text-center">
{{--                                            @php($time = \Illuminate\Support\Carbon::make($exam->exam_time)->format('H:m:s'))--}}
                                            @php($time = new \Carbon\Carbon($exam->exam_time,'Asia/Riyadh'))
{{--                                            @if($exam->exam_time == \Illuminate\Support\Carbon::today('Asia/Riyadh')->format('Y-m-d') && $time->diffInMinutes(\Illuminate\Support\Carbon::now('Asia/Riyadh')) <= $exam->duration_m)--}}
                                            @if($time->format('Y-m-d') == \Illuminate\Support\Carbon::today('Asia/Riyadh')->format('Y-m-d') && \Illuminate\Support\Carbon::now('Asia/Riyadh') >= $time && \Illuminate\Support\Carbon::now('Asia/Riyadh') <= $time->addMinutes($exam->duration_m))
                                            <span class="text-secondary text-sm font-weight-bold"><a class="btn btn-outline-primary btn mb-0 w-100" href="exam/{{$exam->id}}">Start Exam  </a></span>
                                            @else
                                            <span class="text-secondary text-sm font-weight-bold"><a class="btn btn-outline-primary btn mb-0 w-100 disabled">Start Exam</a></span>
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-center text-danger">
                                    No exams yet.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--modals-->








        </div>


    </div>

@endsection
