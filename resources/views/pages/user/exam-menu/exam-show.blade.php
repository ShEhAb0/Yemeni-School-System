<!doctype html>
<html lang="en">
<head>
    <title>School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('/FortAwesome/css/all.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('/FortAwesome/js/all.min.js')}}"></script>
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link  href="{{asset('/css/soft-ui-dashboard.css')}}" rel="stylesheet" />

    <link href="{{asset('/css/customNav.css')}}" rel="stylesheet" />
    <style>
        .samehieght{
            height: 100%;
            padding: 14px!important;
        }
        .btn-outline-secondary:hover{
            cursor: not-allowed!important;
        }
        .pur{
            color: #fefefe;
            background-color: #277553!important;
            cursor: not-allowed!important;
        }
        .blu{
            color: #fefefe;
            background-color: #344767!important;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="container-fluid mt-5 ">


</div>

<section class="ftco-section">

    <div class="container-fluid">
        <div class="row" style="flex-wrap: wrap-reverse;">

            <div class="col-12 col-sm-12 col-lg-9 col-xl-9 col-xxl-9  card card-body">
                <div class="d-flex align-items-between w-100">
                    <div style="width: 70%;">
                        <!--menu button add-->

                        <span class="bg-blue buttonTest col-2 " onclick="Open()">
								<i class="fas fa-bars " style="font-size: 24px;" ></i>
							</span><h4 class="mb-0 purplel-color  mt-1" style="display: inline-block;" > Exam</h4>
                        <!--end menu button add-->
                    </div>
                    <div class="blue-color"><p>Timer: <span id="Timer">00:00:00</span></p>


                    </div>

                </div>

                <hr/>
                <div class="featured-carousel owl-carousel">

                    <div class="item ">
                        <div class="row justify-content-center">

                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>1. questions 1 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input " name="q1" type="checkbox" value="" id="an1">
                                        <label class="form-check-label" for="an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="q1" type="checkbox" value="" id="an2">
                                        <label class="form-check-label" for="an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="q1" type="checkbox" value="" id="an3">
                                        <label class="form-check-label" for="an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="q1" type="checkbox" value="" id="an4" >
                                        <label class="form-check-label" for="an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>2. questions 2 ?</h6>


                                    <div class="form-check">
                                        <input class="form-check-input " name="q2" type="checkbox" value="" id="q2an1">
                                        <label class="form-check-label"  for="q2an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="q2" type="checkbox" value="" id="q2an2" >
                                        <label class="form-check-label"  for="q2an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"  name="q2" type="checkbox" value="" id="q2an3">
                                        <label class="form-check-label" for="q2an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"  name="q2" type="checkbox" value="" id="q2an4" >
                                        <label class="form-check-label" for="q2an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>






                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>3. questions 3 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input "  type="checkbox" value="" name="q11" id="q11an1">
                                        <label class="form-check-label" for="q11an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q11" id="q11an2" >
                                        <label class="form-check-label" for="q11an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q11" id="q11an3">
                                        <label class="form-check-label" for="q11an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q11" id="q11an4" >
                                        <label class="form-check-label" for="q11an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>4. questions 4 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value=""  name="q12" id="q12an1">
                                        <label class="form-check-label" for="q12an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="q12" id="q12an2" >
                                        <label class="form-check-label" for="q12an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="q12" id="q12an3">
                                        <label class="form-check-label" for="q12an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="q12" id="q12an4" >
                                        <label class="form-check-label" for="q12an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>5. questions 5 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" name="q13" id="q13an1">
                                        <label class="form-check-label" for="q13an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="q13" id="q13an2" >
                                        <label class="form-check-label" for="q13an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="q13" id="q13an3">
                                        <label class="form-check-label" for="q13an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="q13" id="q13an4" >
                                        <label class="form-check-label" for="q13an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>





                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>6. questions 6 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" name="q19" id="q19an1">
                                        <label class="form-check-label" for="q19an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an2" >
                                        <label class="form-check-label" for="q19an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an3">
                                        <label class="form-check-label" for="q19an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an4" >
                                        <label class="form-check-label" for="q19an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>7. questions 7 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" name="q19" id="q19an1">
                                        <label class="form-check-label" for="q19an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an2" >
                                        <label class="form-check-label" for="q19an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an3">
                                        <label class="form-check-label" for="q19an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an4" >
                                        <label class="form-check-label" for="q19an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 col-sm-5 col-lg-5 col-xl-5 col-xxl-5 m-1 ">
                                <div class="card min-height-200 p-3 card-body samehieght">
                                    <h6>8. questions 8 ?</h6>

                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" name="q19" id="q19an1">
                                        <label class="form-check-label" for="q19an1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an2" >
                                        <label class="form-check-label" for="q19an2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an3">
                                        <label class="form-check-label" for="q19an3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  name="q19" id="q19an4" >
                                        <label class="form-check-label" for="q19an4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>



                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-3 col-xl-3 col-xxl-3 mb-4 " style="position: relative;">
                <!--move menu button-->
                <!-- <button class="btn btn-primary   btn-sm mb-0 buttonTest"  onclick="Open()">open  </button>  -->
                <!-- <span class="bg-blue buttonTest bg_gr" onclick="Open()">
                <i class="fas fa-bars" style="font-size: 38px;padding: 7px;" ></i>
            </span> -->
                <!--end move menu button-->
                <div class="card p-3 text-center TestSEC"   id="exampleModal1">
                    <!--add this close button-->
                    <p class="text-right d-lg-none d-xl-none"><span class="" onclick="Open()">
			<i class="fas fa-times-circle" style="font-size: 24px;" ></i>
		</span></p>
                    <!--end add this close button-->
                    <div class="w_100 d-flex ps-3 ps-sm-0" ><p class="text-bold text-lg blue-color">Published by:</p><p class="text-sm mt-1 ml-2">Teacher</p></div>
                    <div class="w_100 d-flex ps-3 ps-sm-0" ><p class="text-bold text-lg blue-color">Subject:</p><p class="text-sm mt-1 ml-2">Math</p></div>
                    <div class="w_100 d-flex ps-3 ps-sm-0" ><p class="text-bold text-lg blue-color">Total Questions:</p><p class="text-sm mt-1 ml-2" id="Total">8</p></div>
                    <div class="w_100 d-flex ps-3 ps-sm-0" ><p class="text-bold text-lg blue-color">Total Answers:</p><p class="text-sm mt-1 ml-2" id="Answer">0</p></div>
                    <div class="w_100 d-flex ps-3 ps-sm-0" ><p class="text-bold text-lg blue-color">Total Questions left:</p><p class="text-sm mt-1 ml-2" id="Left">0</p></div>

                    <div class="mt-5" >
                        <button class="btn pur w-100  btn-lg mb-0"  disabled data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit">Submit  </button>

                    </div>

                </div>

            </div>


        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you Really Sure you want to submit all your answers
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">yes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>
<script>
    //	$("#exampleModal").hide();
    //this Total come from Database the number of total question in Exame

    function Open(){
        $("#exampleModal1").toggle();
    }
    var TotalQuestions=20
    //assign the dynamic number to the Total Question in page
    $("#Total").text(TotalQuestions)

    var TotalAnswer=0
    var leftQuestions=0
    var Answer=[]
    //test functionality only on the first 6 questions
    $(".form-check-input").click(function(){

        let name=$(this).attr("name")
        console.log(Answer)
        if (Answer.filter(e => e.name === name).length > 0) {

        }else{
            Answer.push({name:name,Answer:"answer"})
            TotalAnswer++
            leftQuestions=TotalQuestions-TotalAnswer
            $("#Answer").text(TotalAnswer)
            $("#Left").text(leftQuestions)

        }
//if finishing answering all question the submit button will be Enabled
        if(Answer.length>=20){
            $("#submit").addClass("blu")
            $("#submit").removeClass("pur")

            $("#submit").prop('disabled', false);
        }else{
            $("#submit").removeClass("blu")
            $("#submit").addClass("pur")
            $("#submit").prop('disabled', true);

        }

    })
    var startmin=1//here the time will br sign from backend as total mins of exam than will be divide to hours/mins/sec if so
    var time=startmin*60 //all sec in the time
    var countdown = document.getElementById('Timer');//the apper timer to user

    function UpdateTimer(){

        let hours=Math.floor(time/(60*60))
        let mins=Math.floor(time/(60))
        let sec=Math.floor(time%60)
        if(hours>0){
            mins=mins-(hours*60)
        }
        if(hours<=9){
            if(hours==0){
                hours="00"
            }else{
                hours="0"+hours
            }
        }
        if(mins<=9){
            if(mins==0){
                mins="00"
            }else{
                mins="0"+mins
            }
        }
        if(sec==0||sec<=9){
            sec="0"+sec
        }
        countdown.innerHTML=hours+":"+mins+":"+sec
        if(time==0){
            alert("Done")
            clearInterval(x);

        }
        time--;

    }
    var x=setInterval(() => {
        UpdateTimer()
    }, 1000);

</script>
</body>
</html>
