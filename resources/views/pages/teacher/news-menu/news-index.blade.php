@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">News</h6>
@endsection
@section('content')

    <div class="container-fluid">
        <br/>

        <br/>
        <h3 class="purplel-color">News Of Today</h3>
        <div class="row">

            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>News tit</h6>
                        <span><i class="fas fa-clock me-1 blue-color" style="font-size: 12px;"></i><span  style="font-size: 12px;" class="text-bold">22/04/18</span></span>
                    </div>
                </div>
                <div class="card-body  pb-0">
                    <p class="text-body">The concept of the text is not a stable one. It is always changing as the technologies for publishing and disseminating texts evolve. In the past, texts were usually presented as printed matter in bound volumes such as pamphlets or books. <span class="text-body content">Today, however, people are more likely to encounter texts in digital space, where the materials are becoming "more fluid," according to linguists David Barton and Carmen Lee</span><a role="button" class="purplel-color text-bold show_hide" >View More..</a></p>

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>News tit</h6>
                        <span><i class="fas fa-clock me-1 blue-color" style="font-size: 12px;"></i><span  style="font-size: 12px;" class="text-bold">22/04/18</span></span>
                    </div>
                </div>
                <div class="card-body  pb-0">
                    <p class="text-body">The concept of the text is not a stable one. It is always changing as the technologies for publishing and disseminating texts evolve. In the past, texts were usually presented as printed matter in bound volumes such as pamphlets or books. <span class="text-body content">Today, however, people are more likely to encounter texts in digital space, where the materials are becoming "more fluid," according to linguists David Barton and Carmen Lee</span><a role="button" class="purplel-color text-bold show_hide" >View More..</a></p>

                </div>
            </div>


            <div class="card mt-3">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>News tit</h6>
                        <span><i class="fas fa-clock me-1 blue-color" style="font-size: 12px;"></i><span  style="font-size: 12px;" class="text-bold">22/04/18</span></span>
                    </div>
                </div>
                <div class="card-body  pb-0">
                    <p class="text-body">The concept of the text is not a stable one. It is always changing as the technologies for publishing and disseminating texts evolve. In the past, texts were usually presented as printed matter in bound volumes such as pamphlets or books. <span class="text-body content">Today, however, people are more likely to encounter texts in digital space, where the materials are becoming "more fluid," according to linguists David Barton and Carmen Lee</span><a role="button" class="purplel-color text-bold show_hide" >View More..</a></p>

                </div>
            </div>


            <div class="card mt-3 ">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>News tit</h6>
                        <span><i class="fas fa-clock me-1 blue-color" style="font-size: 12px;"></i><span  style="font-size: 12px;" class="text-bold">22/04/18</span></span>
                    </div>
                </div>
                <div class="card-body  pb-0">
                    <p class="text-body">The concept of the text is not a stable one. It is always changing as the technologies for publishing and disseminating texts evolve. In the past, texts were usually presented as printed matter in bound volumes such as pamphlets or books. <span class="text-body content">Today, however, people are more likely to encounter texts in digital space, where the materials are becoming "more fluid," according to linguists David Barton and Carmen Lee</span><a role="button" class="purplel-color text-bold show_hide" >View More..</a></p>

                </div>
            </div>


        </div>

    </div>
@endsection

    @section('scripts')
    <script>
        $(document).ready(function () {
            $(".content").hide();
            $(".show_hide").click(function(){
                if($( this).prev( ".content" ).is(':visible')==false){
                    var txt =$( this).prev( ".content" ).is(':visible') ? ' View More..' : ' View Less ..';
                    $(this).text(txt);
                    $( this).prev( ".content" ).show(200);
                }else{
                    $( this).prev( ".content" ).hide(200);
                }
            });

        });
    </script>
@endsection

