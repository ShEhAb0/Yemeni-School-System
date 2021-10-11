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
                    <select class="form-select" aria-label="Select Grade" id="Grade" name="Grade">

                        <option value="1">Grade 1</option>
                        <option value="2">Grade 2</option>
                        <option value="3">Grade 3</option>


                        <option value="4">Grade 4</option>
                        <option value="5">Grade 5</option>
                        <option value="6">Grade 6</option>


                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>


                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                        <option value="13">Grade 13</option>

                    </select>
                </div>
                <div class="col-auto w_50">
                    <p>Select Subject</p>
                    <select class="form-select" aria-label="Select Class" id="Subject" name="Subject">

                        <option value="1">Math</option>
                        <option value="2">Arabic</option>
                        <option value="3">Biolody</option>
                        <option value="4">English</option>
                        <option value="5">science</option>
                        <option value="6">chemistry</option>
                        <option value="7">History</option>

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
                                        <p class="text-sm font-weight-bold mb-0 text-center">Moahmmed</p>
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
