@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Lessons</h6>
@endsection
@section('content')



    <div class="container-fluid pt-5">


        <div class="d-flex justify-content-around "  style="max-height: 800px;"  >


            <div class="card overflow-hidden" >
                <div class="card-header pb-3 p-3">
                    <h6 class="mb-3 purplel-color ">Lessons for the subject</h6>
                    <br/>
                    <br/>
                    <br/>
                    <div class="card card-body mx-4 mt-n6 overflow-hidden">
                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-xl-6 " style="margin: 0 auto;">
                                <div class="w-100 my-1">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="search...">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-5 col-xl-5">
                                <div class="w-100 my-1">

                                    <select class="form-select" aria-label="Select Class" id="Subject" name="Subject" onchange="getLessons(this.value);">
                                        <option disabled="disabled" selected="selected">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <br/>



                        </div>
                    </div>
                </div>
                <div class="text-center py-3" id="chooseSubject">
                    <p class="text-info">You have to choose the Subject</p>
                </div>
                <div class="text-center py-3 hidden" id="loader">
                    <i class="fa fa-spinner fa-3x fa-spin"></i>
                </div>
                <div id="lessonData" class="hidden">
                @include('pages.user.lesson-menu.lesson-data')
                    <div class="text-center my-3">
                        {{ $lessons->render() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/axios.min.js')}}"></script>
    <script>
        function getLessons(id) {
            $('#lessonData').addClass('hidden');
            $('#chooseSubject').addClass('hidden');
            $('#loader').removeClass('hidden');
            axios({
                method: 'get',
                url: '/lesson/'+id+'/edit'
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#loader').addClass('hidden');
                        $('#lessonData').html(response.data);
                        $('#lessonData').removeClass('hidden');
                    }
                })
        }
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            $('#lessonData').addClass('hidden');
            $('#loader').removeClass('hidden');
            var page = $(this).attr('href').split('page=')[1];
            var sub = $('#Subject').val();

            axios({
                method: 'get',
                url: '/lesson/'+sub+'/edit?page='+page
            })
                .then(response => {
                    if (response.status === 200) {
                        $('#loader').addClass('hidden');
                        $('#lessonData').html(response.data);
                        $('#lessonData').removeClass('hidden');
                    }
                })
        });
    </script>
@endsection
@endsection

