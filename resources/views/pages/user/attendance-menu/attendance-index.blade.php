@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Attendance</h6>
@endsection
@section('content')

    <div class="container-fluid">

        <br/>
        <br/>
        <br/>
        <br/>

        <div class="card card-body mx-4 mt-n6 overflow-hidden">
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

                    <div class="col-auto w_50">
                        <p>Select Term</p>
                        <select class="form-select" aria-label="Select Grade" id="Grade" name="Grade">

                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>

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
                            <h6>Attandace table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>

                                        <th class="text-secondary purplel-color opacity-9  text-center">Lesson Title </th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Date </th>
                                        <th class="text-secondary purplel-color opacity-9 text-center">Attendance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" >
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">2</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input"  style="float: none;" type="checkbox" checked value="" id="flexCheckChecked" >
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">3</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" >
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">4</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input"  style="float: none;" type="checkbox" checked value="" id="flexCheckChecked" >
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">5</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input"  style="float: none;" type="checkbox" value="" id="flexCheckChecked" >
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm  font-weight-bold mb-0 text-center">6</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">Math</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="form-check align-middle text-center me-3" style="float: none;">
                                                <input class="form-check-input"  style="float: none;" type="checkbox" checked value="" id="flexCheckChecked" >
                                            </div>


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



        <div class="container-fluid py-1">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Total Subject's Attandace</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center text-sm">Start Date  </th>
                                        <th class="text-secondary purplel-color opacity-9 text-center text-sm">End Date  </th>

                                        <th class="text-secondary purplel-color opacity-9  text-center text-sm">Total Lessons  </th>
                                        <th class="text-secondary purplel-color opacity-9  text-center text-sm">Total absence  </th>
                                        <th class="text-secondary purplel-color opacity-9  text-center text-sm">Total presence  </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">1</p>
                                        </td>



                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/2/1 12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">2021/9/1 12:00 PM</span>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">20</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">2</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-center">18</p>
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
@section('scripts')
    <script>
        //ParentInfo
        //Choose
        $(function () {

            $('#Choose').click(function (e) {

                $('#ParentInfo').toggle();
                $('#parentexsits').toggle();


            });
            $('#Choose2').click(function (e) {

                $('#ParentInfo2').toggle();
                $('#parentexsits2').toggle();


            });
        });
    </script>

@endsection
