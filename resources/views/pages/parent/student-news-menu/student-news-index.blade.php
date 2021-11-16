@extends('pages.parent.layouts.parent-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Student News</h6>
@endsection
@section('content')

    <div class="container-fluid">
        <br/>

        <br/>
        <h3 class="purplel-color">News Of Today</h3>
        @if($newses->count() > 0)
            <div class="row mt-4">
                @foreach($newses as $news)
                    <div class="card">


                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6>{{$news->title}}</h6>
                                <span><i class="fas fa-clock me-1 blue-color" style="font-size: 12px;"></i><span  style="font-size: 12px;" class="text-bold">{{$news->created_at}}</span></span>
                            </div>
                        </div>
                        <div class="card-body  pb-0">
                            <p class="text-body"class="text-body content">{{$news->description}}
                                <a role="button" class="purplel-color text-bold show_hide" >View More..</a></p>

                        </div>
                    </div>

                @endforeach
            </div>
        @else
            <div class="text-center">
                <p class="h5 text-danger">There are no news yet..!</p>
            </div>
        @endif

        <div class="text-center">
            {{$newses->render()}}


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
