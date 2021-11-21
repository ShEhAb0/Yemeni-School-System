@extends('pages.parent.layouts.parent-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Marks</h6>
@endsection
@section('content')


<div class="container-fluid">
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="card card-body  mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="search...">
                </div>
            </div>

            <br/>
            <br/>
            <div class="row g2">
                <div class="col-auto w_50">
                    <p>Select Term</p>
                    <select class="form-select" aria-label="Select Grade" id="term" name="term" onchange="getMarks(this.value);">
                        <option value="" disabled selected>Select The Term</option>
                        @foreach($terms as $term)
                            <option value="{{$term->id}}">{{$term->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center col-auto align-items-end hidden" id="loader">
                    <i class="fa fa-spinner fa-3x fa-spin"></i>
                </div>



            </div>


        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Marks table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Subject</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Term</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Level</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Attendances</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Assignments</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Exam</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Total</th>
                                </tr>
                                </thead>
                                <tbody id="tableData">
                                @include('pages.parent.mark-menu.mark-table')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--modals-->








    </div>


</div>
@section('scripts')
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script>
        function getMarks(id) {
            $('#loader').removeClass('hidden');
            $('#loader').addClass('row');
            axios({
                method:'get',
                url:'/parent/mark/' + id
            })
                .then(response =>{
                    $('#tableData').html(response.data);
                    $('#loader').addClass('hidden');
                    $('#loader').removeClass('row');
                })
        }
    </script>
@endsection
@endsection
