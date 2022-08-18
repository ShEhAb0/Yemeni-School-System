@extends('pages.teacher.layouts.teacher-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">My Students</h6>
@endsection
@section('content')



    <div class="container-fluid">
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
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
                    <p>Select Grade</p>
                    <select class="form-select" aria-label="Select Grade"  id="grades" name="grade" onchange="getSubjects(this.value);">
                        <option disabled="disabled" selected="selected">Select Grade</option>

                        @if($grades->count()>0)
                            @foreach($grades as $grade)
                                @foreach($grade as $g)
                                    <option value="{{$g->grade->id}}">{{$g->grade->grade_name}}</option>
                                @endforeach
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-auto w_50">
                    <p>Select Subject</p>
                    <select class="form-select" aria-label="Select Class" id="subjects" name="subjects" disabled>
                        <option value="" disabled selected>Select the Grade First</option>
                    </select>
                </div>


            </div>


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
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center ">Student Name</th>
                                    <th class="text-secondary purplel-color opacity-9  text-center">Total Preformance</th>
                                    <th class="text-secondary purplel-color opacity-9 text-center">Controllers</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center"></p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">98%</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash blue-color" style="font-size: 20px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
