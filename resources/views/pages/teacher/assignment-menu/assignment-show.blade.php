<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{'/img/apple-icon.png'}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">

    <title>
        School
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}"/>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />

    <script src="{{asset('/js/jquery-3.3.1.js')}}"></script>
    <link href="{{asset('/css/vedio.css')}}" rel="stylesheet" />
    <link href="{{asset('/vedio/video-js.css')}}" rel="stylesheet" />
</head>
<body>

<div class="container  z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4" style="background: #FFF;">
                <div class="container-fluid">

                    <!--Mobile-responsivness change One(add title_Dash class at the end) -->
                    <a href="/teacher/index">
                        <i class="fa fa-arrow-left cursor-pointer text-dark" aria-hidden="true"></i>
                    </a>
                    <span class="d-sm-inline text-dark text-bold"></span>

                    <!--Mobile-responsivness change one end-->


                    <div>
                        <ul class="navbar-nav mx-auto">

                        </ul>
                        <ul  class="navbar-nav  justify-content-end" style="flex-direction: row;">
                            <li class="nav-item">

                                <a class="d-flex d-flex align-items-center  py-1 cursor-pointer"  href="/teacher/profile/{{Auth::user()->id}}">
                                    <img src="{{asset('/images/teachersProfiles/'.Auth::guard('teacher')->user()->image)}}" class="rounded-circle" alt="Cinque Terre" width="40" height="40">
                                    <!--Mobile-responsivness change two(add title_Dash class at the end) -->
                                    <div style="margin: auto 0 auto 10;">    <span class="d-sm-inline text-dark text-bold title_Dash">{{ Auth::user()->username}}</span>
                                        <!--Mobile-responsivness change two end-->

                                    </div>
                                </a>
                            </li>

{{--                            <li class="nav-item px-2 px-lg-3 px-md-3 d-flex align-items-center">--}}
{{--                                <a href="./Message.html" class="nav-link text-body p-0">--}}
{{--                                    <i class="fas fa-envelope cursor-pointer text-dark" ></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown px-2 px-lg-3 px-md-3 d-flex align-items-center ">--}}
{{--                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="fa fa-bell cursor-pointer text-dark"></i>--}}
{{--                                </a>--}}

{{--                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <li class="mb-2">--}}
{{--                                        <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                            <div class="d-flex py-1">--}}
{{--                                                <div class="my-auto">--}}
{{--                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column justify-content-center">--}}
{{--                                                    <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                        <span class="font-weight-bold">Notify 1</span>details--}}
{{--                                                    </h6>--}}
{{--                                                    <p class="text-xs text-secondary mb-0">--}}
{{--                                                        <i class="fa fa-clock me-1"></i>--}}
{{--                                                        13 minutes ago--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="mb-2">--}}
{{--                                        <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                            <div class="d-flex py-1">--}}
{{--                                                <div class="my-auto">--}}
{{--                                                    <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column justify-content-center">--}}
{{--                                                    <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                        <span class="font-weight-bold">Notify 2</span>details--}}
{{--                                                    </h6>--}}
{{--                                                    <p class="text-xs text-secondary mb-0">--}}
{{--                                                        <i class="fa fa-clock me-1"></i>--}}
{{--                                                        1 day--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                            <div class="d-flex py-1">--}}
{{--                                                <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">--}}
{{--                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                                                        <title>credit-card</title>--}}
{{--                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">--}}
{{--                                                                <g transform="translate(1716.000000, 291.000000)">--}}
{{--                                                                    <g transform="translate(453.000000, 454.000000)">--}}
{{--                                                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>--}}
{{--                                                                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>--}}
{{--                                                                    </g>--}}
{{--                                                                </g>--}}
{{--                                                            </g>--}}
{{--                                                        </g>--}}
{{--                                                    </svg>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column justify-content-center">--}}
{{--                                                    <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                        Notify 3 type without details--}}
{{--                                                    </h6>--}}
{{--                                                    <p class="text-xs text-secondary mb-0">--}}
{{--                                                        <i class="fa fa-clock me-1"></i>--}}
{{--                                                        2 days--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li class="nav-item px-3 d-flex align-items-center">

                                <a href="{{ route('teacher.logout') }}"
                                   onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt text-dark me-sm-1"></i>
                                </a>

                                <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<!--body-->
<div class="container-fluid ">
    <br/>


    <br/>
    <br/>

    <!--first row-->
    <div class="d-flex align-content-between w-100 mt-5" style="flex-wrap: wrap;margin: 0 auto;box-shadow: 0px -1px 6px 1px rgb(0 0 0 / 41%);border-radius: 18px;">
        <!--Lesson Title Section-->

        <div class="col-12 col-sm-12 col-lg-8 col-xl-8">


            <!--Mobile responsivness change three -->
            <div class=" p-2 pt-4 w-100 h_100_resp">
                <!-- Mobile responsivness change three end -->
                <div class="d-flex justify-content-between w-100 mt-1 mb-1">

                    <h3 >Assignment Title:  {{$assignment->title}}</h3>
                    <span ><i class="fas fa-clock me-2 purplel-color" style="font-size: 15px;"></i><span class="text-sm">Publishing Date: </span><span class="ms-2 text-sm">{{$assignment->due_date}}</span></span>
                </div>
                <div>
                    <p class="black"><i class="fas fa-chalkboard-teacher me-2 purplel-color" style="font-size: 15px;"></i>Teacher Name: <span>{{Auth::user()->teacher_name}}</span></p>
                    <p class="black"><i class="fas fa-book-open me-2 purplel-color" style="font-size: 15px;"></i>Subject Related: <span>Math (grade {{$assignment->level_id}})</span></p>
                    <div class="d-flex justify-content-between w_70">
                        <h4 class="">Assignment Description</h4>
                    </div>

                    <p class="p-2 black" style="text-align: justify;" >{{$assignment->description}}</p>


                    <div class="d-flex p-2">
                        <div class="pe-5">
                            <h4 class="mt-3 pb-2" >Photos </h4>
                            <div class="d-flex justify-content-around">

                                <div>
                                    @if($assignment->image_name)
                                        <div>
                                            <a href="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->image_name)}}" download="{{$assignment->image_name}}"><img src="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->image_name)}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100"></a>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="d-flex justify-content-around mt-2">
                                @if($assignment->image_name)
                                    <div>
                                        <a href="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->image_name)}}" download="{{$assignment->image_name}}"><img src="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->image_name)}}" class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;">
                                        </a>
                                    </div>
                                @endif
                            </div>

                            {{--                            <div class="d-flex justify-content-around mt-2">--}}
                            {{--                                <div><a href="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->photo->url)}}" class="files" download="{{$lesson->photo->url}}" src="{{asset('/Lessons/'.$lesson->subjects->subject_name.'/'.$lesson->photo->url)}}"><i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <!--File section-->
                        <div class="ps-5">
                            <h4 class="mt-3 pb-2">Files </h4>
                            <div class="d-flex justify-content-around ">

                                <div>
                                    @if($assignment->file_name)
                                        <div>
                                            <a href="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->file_name)}}" download="{{$assignment->file_name}}">
                                                <i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;">
                                                </i> <span class="black">{{$assignment->file_name}}</span>
                                            </a>
                                        </div>
                                    @endif
                                    {{--                                    <a href="../assets/js/soft-ui-dashboard.js" class="files" download="filename"><i class="fas fa-cloud-download-alt me-2 purplel-color" style="font-size:15px;"></i> <span class="black">File name</span></a>--}}
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>
        <!--vedio Section-->
        <div class="col-12 col-sm-12 col-lg-4 col-xl-4 ">
            <!-- Mobile responsivness change four -->
            <div class="card overflow-hidden h_100_resp">
                <!-- Mobile responsivness change four end -->
                <video
                    id="my-video"
                    class="video-js p-2"
                    controls
                    preload="auto"
                    width="100%"
                    height="100%"

                    data-setup="{}"
                >
                    @if($assignment->video_name)
                        <source src="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/'.$assignment->video_name)}}" type="video/mp4" />
                    @endif
                    {{--                    <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4" />--}}
                    {{--                    <source src="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4" type="video/mp4" />--}}
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank"
                        >supports HTML5 video</a
                        >
                    </p>
                </video>
                <!--File photo section-->








            </div>

        </div>
</div>
</div>
<br/>

<div class="d-flex justify-content-around" style="flex-wrap: wrap;">
    <div class="po_re col-12 col-sm-12 col-lg-6 col-xl-6">
        <h2 >Students Assignments</h2>
        <div class="page_bg_2">

            <div class="py-5 mt-5">
                <div class="Answer_body col-8 mt-3"  style="margin: 0 auto;" id="Answer_scroll">
                    @if($answers->count() > 0)
                        @foreach($answers as $answer)
                            <div class="list-group mb-2">
                                <div href="" class="list-group-item">
                                    <div class="d-flex  py-1">
                                        <img src="{{asset('/images/usersProfiles/'.$answer->student->image)}}" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                        <div style="margin: auto 10px;" class="w_70" ><span class="text-dark text-bold">{{$answer->student->student_name}}</span>
                                            <br/>
                                            <span  style="font-size: 15px;" class="text-primary"><i class="fas fa-clock me-2" style="font-size: 14px;"></i><span class="font-weight-bold">Recive Date: </span> {{$answer->delivery_date}}</span>
                                        </div>

                                        <!-- <div class="form-check align-middle text-center me-4" style="float: none;">
                                             <input class="form-check-input"  style="float: none;" type="radio" value="" id="flexCheckChecked" >
                                         </div> -->


                                        <div class="align-middle text-center " style="margin-top: 3px;">
          <span onclick="Assigment($(this))" data-id="{{$answer->id}}" data-name="{{$answer->student->student_name}}"
                data-date="{{$answer->delivery_date}}" data-attch="{{asset('/Assignments/'.$assignment->subjects->subject_name.'/Answers/'.$answer->file_name)}}"
                data-fname="{{$answer->file_name}}"  data-answer="{{$answer->answer}}" data-mark="{{$answer->mark}}" class="text-secondary font-weight-bold text-xs me-3" id="stData">
            <i class="fas fa-external-link-alt blue-color" style="font-size: 20px;"></i>
          </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center h5">No answers for this assignment yet..</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="po_re col-12 col-sm-12 col-lg-4 col-xl-4 Te_ic" id="pics">
        <div class="person2"></div>
    </div>


</div>



<br/> <hr/>

<!--chat section-->
<div  class="container-fluid ">

    <div>
        <h3>Comments</h3>
        <hr/>
        <div class="chatsBody2 mb-3" id="BodyText">
            @if(count($assignment->assignmentComments) > 0)
                @foreach($assignment->assignmentComments as $comment)
                    @if($comment->user_type == 1)
                        <div class="sender2 bg_gr_light w-50">
                                            <div>
                                                <img src="{{asset('/images/teachersProfiles/'.Auth::guard('teacher')->user()->image)}}" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                            </div>
                            <div class="w-100" style="margin: auto 0;">
                                <span class="ms-2"><strong>T. {{$comment->username}}</strong></span>
                            </div>
                            <div class="w-100" style="margin: auto 0;">
                                <span class="ms-2">{{$comment->comment}}</span>
                            </div>
                            <div class="w-100" style="margin: auto 0;">
                                <small class="ms-2">{{$comment->created_at}}</small>
                            </div>

                        </div>
                    @else
                        <div class="receiver2 bg_gr w-50">
                                            <div>
                                                <img src="{{asset('/images/usersProfiles/'.$comment->image)}}" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                                            </div>
                            <div class="w-100" style="margin: auto 0;">
                                <span class="ms-2"><strong>{{$comment->username}}</strong></span>

                            </div>
                            <div class="w-100" style="margin: auto 0;">
                                <span class="ms-2">{{$comment->comment}}</span>
                            </div>

                            <div class="w-100" style="margin: auto 0;">
                                <small class="ms-2">{{$comment->created_at}}</small>
                            </div>

                        </div>
                    @endif
                @endforeach
            @else
                <strong class="text-danger">No comments yet.</strong>
            @endif
        </div>

        <div class="input-msg">
            <form method="POST" action="/teacher/assignment" class="row w-100">
                @csrf
                @method('POST')
                <div class="col-11">
                    <input type="text" name="comment" class="form-control w-100" placeholder="Type your comment.." required/>
                </div>
                <div class="col-1">
                    <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
                    <input type="hidden" name="level" value="{{$assignment->level_id}}">
                    <button type="submit" name="save_comment" class="btn btn-link">
                        <i class='far fa-paper-plane'></i>
                    </button>
                </div>
            </form>
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

                    <input class="form-control my-1 mb-2" name="mark" id="mark" type="number" placeholder="Enter Student Marks" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="marks" class="btn btn-outline-primary" >Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script src="{{asset('/vedio/video-js.css')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>

<script>

    $('.files').click(function(e) {
        e.preventDefault();  //stop the browser from following

        var url= "../assets/js/soft-ui-dashboard.js";
        console.log(url)
        url.download = "fd";


        //window.location.href = '../assets/js/soft-ui-dashboard.js';
    });
    function send(){
        var text=$("#send-input").val()
        //Mobile responsivness change (five and six)
        $(`      <div class="d-flex receiver2 bg_gr bg_gr_light">
                <div>
                  <img src="../assets/img/bruce-mars.jpg" class="rounded-circle" alt="Cinque Terre" width="50" height="50">
                </div>
                  <div class="d-flex justify-content-between w-100" style="margin: auto 0;">
                <span class="ms-2">${text}</span>
                 <div class="col-4" style="display: inherit;">
                    <a  class="text-secondary font-weight-bold text-xs  me-1" href="#" role="button">
                        <i class="fas fa-edit text-dark " style="font-size: 15px;"></i>
                                          </a>

                                              <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-1" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash text-dark" style="font-size: 15px;"></i>
                                          </a>

                 </div>
                 </div>

                </div>`).appendTo("#BodyText")
        $("#send-input").val("")
    }
    //Mobile responsivness change (five and six) end


    function Assigment(){
        $('#Assigment').modal('toggle');
    }
    function Files(){
        alert("When press it will download every student files")
    }
</script>
<script>


    $('.files').click(function(e) {
        e.preventDefault();  //stop the browser from following

        var url= "{{asset('js/soft-ui-dashboard.js')}}";
        console.log(url)
        url.download = "fd";


    });
    function Assigment(d){
        var id = d.data('id');
        var name = d.data('name');
        var date = d.data('date');
        var attch = d.data('attch');
        var fname = d.data('fname');
        var answer =d.data('answer');
        var mark =d.data('mark');
        // var id = $('#stData').data('id');
        // var name = $('#stData').data('name');
        // var date = $('#stData').data('date');
        // var attch = $('#stData').data('attch');
        // var fname = $('#stData').data('fname');
        // var answer = $('#stData').data('answer');
        // var mark = $('#stData').data('mark');

        $('#formData').attr('action','/teacher/assignment/'+id);
        $('#studentName').html(name);
        $('#recDate').html(date);
        $('#attch').attr('href',attch);
        $('#attch').attr('download',fname);
        $('#answerText').html(answer);
        $('#mark').val(mark);
        $('#Assigment').modal('toggle');
    }
    function Files(){
        alert("When press it will download every student files")
    }
</script>
</html>
