@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">News</h6>
@endsection
@section('content')
    <div class="container-fluid">
        <br/>

        <br/>
        <h3 class="purplel-color">News Of Today</h3>
        @if($newses->count()>0)
            <div class="row mb-3">
                @foreach($newses as $news)
                    <div class="card mb-3">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6>{{$news->title}}</h6>
                                <span><i class="fas fa-clock me-1 blue-color" style="font-size: 12px;"></i><span  style="font-size: 12px;" class="text-bold">{{$news->created_at}}</span></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-body text-truncate content">{{$news->description}}</p>
                          <!--  <a role="button" class="purplel-color text-bold show_hide" >Read More..</a> -->
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                {{$newses->render()}}
            </div>
        @else
            <div class="card my-3">
                <div class="card-body text-center">
                    <p class="h5 text-danger">There are no news yet..!</p>
                </div>
            </div>
        @endif
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".show_hide").click(function(){
                if($( this).prev( ".content" ).hasClass('text-truncate')){
                    $(this).html(' Read Less');
                    $( this).prev( ".content" ).removeClass('text-truncate');
                }else{
                    $(this).html(' Read More..');
                    $( this).prev( ".content" ).addClass('text-truncate');
                }
            });

        });
    </script>

@endsection
