@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">All Students</h6>
@endsection
@section('content')



    <div class="container-fluid">
        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
{{--                <div class="col-12">--}}
{{--                    <div class="input-group">--}}
{{--                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>--}}
{{--                        <input type="text" class="form-control" placeholder="search...">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <br/>--}}
{{--                <br/>--}}
                <form method="POST" action="/admin/all/students" class="row g2">
                    @csrf
                    @method('POST')
                    <div class="col-auto w-50">
                        <div class="form-group">
                        <span>Select Term</span>
                        <select class="form-select" aria-label="Select Term" id="term" name="term" onchange="showGrades()">

                            <option value="" disabled selected>Select Term</option>
                            @foreach($terms as $term)
                                <option value="{{$term->id}}">{{$term->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="col-auto w-50">
                        <div class="form-group">
                        <span>Select Grade</span>
                        <select class="form-select" aria-label="Select Grade" id="grade" name="grade" onchange="showSubjects(this.value)">
                            <option value="" disabled selected>Select Grade</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <hr>
                    <div class="text-center mb-2">
                        <p class="h5 purplel-color">Upgrade Students</p>
                    </div>
                    <div class="col-auto w-50">
                        <span>Select Number Of Pass Subjects</span>
                        <select class="form-select" aria-label="Select Number Of Pass Subjects" name="subject" id="subject" onchange="showTotal()">
                            <option value="" disabled selected>Pass Subjects</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col-auto w-50">
                        <span>Select Minimum Total</span>
                        <select class="form-select" aria-label="Select Min. Total" name="total" id="totalMarks">
                            <option value="" disabled selected>Select Min. Total</option>
                            <option value="50">>= 50</option>
                            <option value="60">>= 60 </option>
                        </select>
                    </div>
                    <div class="my-2">
                        <button type="submit"  class="btn btn-primary btn-sm w-100 mb-0" title="Upgrade to the next grade" id="submit">
                            <i class="fas fa-check-circle"></i> Upgrade
                        </button>
                    </div>


                </form>


            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Grade table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="text-center text-danger" id="message">
                                <i class="fa fa-exclamation-circle"></i> Select Term and Grade.
                            </div>
                            <div class="text-center py-3 hidden" id="loader">
                                <i class="fa fa-spinner fa-3x fa-spin"></i>
                            </div>
                            <div class="table-responsive p-0 hidden" id="tableData">
                                @include('pages.admin.upgrade-menu.upgrade-table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#grade').prop('disabled', true);
            $('#subject').prop('disabled', true);
            $('#totalMarks').prop('disabled', true);
            $('#submit').prop('disabled', true);
        });

        function showGrades(){
            $('#grade').prop('disabled', false);
        }

        function showSubjects(grade){
            $('#subject').prop('disabled', false);
            $('#message').addClass('hidden');
            $('#tableData').addClass('hidden');
            $('#loader').removeClass('hidden');
            var term = $('#term').val();
            axios({
                method:'get',
                url:'/admin/all/students/' + term + '/' + grade
            })
                .then(response =>{
                        $('#tableData').html(response.data);
                        $('#loader').addClass('hidden');
                        $('#tableData').removeClass('hidden');
                });

        }

        function showTotal(){
            $('#totalMarks').prop('disabled', false);
            $('#submit').prop('disabled', false);
        }
    </script>
@endsection
@endsection
