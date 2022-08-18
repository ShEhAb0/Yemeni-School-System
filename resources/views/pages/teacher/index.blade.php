@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>

    </div>
@endsection
@section('content')


    <div class="container-fluid py-4">

        <div class="row text-center">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold"> Grades Number</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{count($subject->unique()->values())}}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <svg class="cola" width="20px" height="20px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>box-3d-50</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                        <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                                                        <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Students Number</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$students}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="cola fas fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Subjects Number</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{count($subject->unique()->keys())}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="cola fas fa-book  text-lg opacity-10" aria-hidden="true"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br/>
        <br/>
        <Br/>

        <div class="row">
            <div class="col-lg-7 mb-sm-5 mb-5 mb-lg-0 mb-md-3 mb-xl-0">
                <div class="card card-body  p-3" style="height: 100%;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bolder">Delivered Assignments</h5>
                            <div class="modal-body max-height-vh-80" style="overflow-y:auto">
                                @if($assignments->count() > 0)
                                    @foreach($assignments as $assignment)
                                    @foreach($assignment->assignment as $a)
                                <div class="list-group mb-1">

                                    <div class="list-group-item">
                                        <div class="d-flex  py-1">
                                            <img src="{{asset('/images/usersProfiles/'.$a->student->image)}}" class="rounded-circle mt-3 mt-sm-3 mt-lg-0 mt-md-0 mt-xl-0" alt="Cinque Terre" width="50" height="50">
                                            <div style="margin: auto 10;" class="ms-sm-2 ms-md-4 ms-lg-2 ms-xl-2 font_dash1"><span class="text-dark text-bold">{{$a->student->student_name}}</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>{{$a->delivery_date}}</span>
                                            </div>
                                            <div style="margin: auto 10;" class="ms-sm-2 ms-md-4 ms-lg-2 ms-xl-2 font_dash1"><span class="text-dark text-bold">{{$a->title}}</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-book-reader me-2" style="font-size: 14px;"></i>{{$a->subjects->subject_name}}</span>
                                            </div>
                                            <div class="align-middle text-center " style="margin-top: 3px;">
          <span onclick="Assigment($(this))" data-id="{{$a->id}}" data-name="{{$a->student->student_name}}"
                data-date="{{$a->delivery_date}}" data-attch="{{asset('/Assignments/'.$a->subjects->subject_name.'/Answers/'.$a->file_name)}}"
                data-fname="{{$a->file_name}}" data-answer="{{$a->answer}}" data-mark="{{$a->mark}}" class="text-secondary font-weight-bold text-xs me-3" >
            <a class="ms-4 mt-3 mt-sm-2 mt-lg-0 mt-md-0 mt-xl-0  ms-sm-6 ms-md-8 ms-lg-5 ms-xl-5" ><i class="fas fa-share-square font_dash2" style="font-size: 48px;"></i></a>
          </span>
                                            </div>

{{--                                            <a  href="" class="ms-4 mt-3 mt-sm-2 mt-lg-0 mt-md-0 mt-xl-0  ms-sm-6 ms-md-8 ms-lg-5 ms-xl-5" ><i class="fas fa-share-square font_dash2" style="font-size: 48px;"></i></a>--}}

                                        </div>

                                    </div>

                                </div>
                                    @endforeach
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <p class="h5 text-danger">There are no answers ..!</p>
                                    </div>
                                @endif







                            </div>


                        </div>

                    </div>

                </div>





            </div>


            <div class="modal  fade" id="Assigment" tabindex="-1" aria-labelledby="Assigments" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Assigments">Student Answer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="" id="formData">
                            @csrf
                            @method('PUT')
                            <div class="modal-body max-height-vh-80" style="overflow-y:auto">
                                <div class="d-flex justify-content-between">
                                    <span class="text-bold" id="studentName"></span><span class="text-bold">Recive Date: <span class="text-bold" id="recDate"></span></span>

                                </div>
                                <div class="my-1 mb-2">
                                    <a href="" id="attch" class="btn btn-block btn-secondary bg-dark text-white w-100 py-1 pb-3 pt-3 mt-3" download="">
                                        <i class="fas fa-arrow-circle-up white me-2" style="font-size: 18px;"></i>Student Attachments</a></div>
                                <textarea class="form-control my-1 mb-2"  placeholder="Answer" id="answerText" rows="5"></textarea>
                                <input class="form-control my-1 mb-2" name="mark" type="number" placeholder="Enter Student Marks" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="marks" class="btn btn-outline-primary" >Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-lg-5">

                <div class="card card-body p-3" style="height: 100%;" >

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bolder">News</h5>
                            <div class="max-height-vh-80  h-80" style="overflow-y: auto;">
                                @if($news->count() > 0 )

                                @foreach($news as $n)
                                    <p class="mb-1 pt-2 text-bold">Published at : {{$n->created_at}} </p>
                                    <h5 class="font-weight-bolder">News Title: {{$n->title}}</h5>
                                    <p class="mb-5">{{substr($n->description ,0 , 1000)}} {{strlen($n->description) > 1000 ? "..." : ""}}</p>
                                @endforeach

                            </div>
                            @else
                                <div class="text-center">
                                    <p class="h5 text-danger">There are no news ..!</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>

@endsection
@section('scripts')

<script>
    function Assigment(d){
        var id = d.data('id');
        var name = d.data('name');
        var date = d.data('date');
        var attch = d.data('attch');
        var fname = d.data('fname');
        var answer =d.data('answer');
        var mark =d.data('mark');

        $('#formData').attr('action','/teacher/index/');
        $('#studentName').html(name);
        $('#recDate').html(date);
        $('#attch').attr('href',attch);
        $('#attch').attr('download',fname);
        $('#answerText').html(answer);
        $('#mark').val(mark);
        $('#Assigment').modal('toggle');
    }
</script>
@endsection
