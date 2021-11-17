@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <h6 class="font-weight-bolder mb-0">Exams</h6>
@endsection
@section('content')

    <div class="container-fluid">
        <br/>
        <br/>
        <br/>
        <br/>

        <!--page apper if there is no Exame Today-->
        <!-- <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
         <div class="row gx-4">
           <div class="col-12 text-center">
         <div class="noExam">

         </div>
         <div class="text-center">
          <h2>There is no Exame Today..</h2>
         </div>
                 </div>
                 </div>
                 </div> -->


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Exams Schedule </h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">#</th>
                                        <th class="text-secondary purplel-color opacity-9 text-center ">Subject Name</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Teacher Name</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Duration</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Exam Date</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Exam Time</th>
                                        <th class="text-secondary purplel-color opacity-9  text-center">Controller</th>
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
                                            <span class="text-secondary text-sm font-weight-bold">Mohammed</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">50 mins</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">10/6/2020</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">12:00 PM</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><a class="btn btn-outline-primary btn mb-0 w-100" href="exam/show">Start Exam  </a></span>
                                        </td>
                                    </tr>



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

@endsection
