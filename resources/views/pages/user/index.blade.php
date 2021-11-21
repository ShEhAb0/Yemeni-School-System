@extends('pages.user.layouts.user-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>

    </div>
@endsection
@section('content')



    <div class="container-fluid py-4">



        <div class="row text-center">

            <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Grade</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        2
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Term</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        1
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br/>
        <br/>
        <Br/>





        <div class="row">
            <div class="col-lg-7 mb-sm-5 mb-5 mb-lg-0 mb-md-3 mb-xl-0">
                <div class="card card-body  p-3" style="height: 100%;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bolder">DeadLine Assignments</h5>
                            <div class="modal-body max-height-vh-80" style="overflow-y:auto">
                                <div class="list-group mb-1">
                                    <div class="list-group-item">
                                        <div class="d-flex  py-1">
                                            <img src="../assets/img/home-decor-2.jpg" class="rounded-circle mt-3 mt-sm-3 mt-lg-0 mt-md-0 mt-xl-0" alt="Cinque Terre" width="50" height="50">
                                            <div style="margin: auto 10;" class="ms-sm-2 ms-md-4 ms-lg-2 ms-xl-2 font_dash1"><span class="text-dark text-bold">Student Name</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1 12:00 PM</span>
                                            </div>
                                            <div style="margin: auto 10;" class="ms-2 ms-sm-6 ms-md-8 ms-lg-3 ms-xl-3 font_dash1"><span class="text-dark text-bold">Assignment Title</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-book-reader me-2" style="font-size: 14px;"></i>Grade 1</span>
                                            </div>

                                            <a  href="" class="ms-4 mt-3 mt-sm-2 mt-lg-0 mt-md-0 mt-xl-0  ms-sm-6 ms-md-8 ms-lg-5 ms-xl-5" ><i class="fas fa-share-square font_dash2" style="font-size: 48px;"></i></a>

                                        </div>
                                    </div>
                                </div>


                                <div class="list-group mb-1">
                                    <div class="list-group-item">
                                        <div class="d-flex  py-1">
                                            <img src="../assets/img/home-decor-2.jpg" class="rounded-circle mt-3 mt-sm-3 mt-lg-0 mt-md-0 mt-xl-0" alt="Cinque Terre" width="50" height="50">
                                            <div style="margin: auto 10;" class="ms-sm-2 ms-md-4 ms-lg-2 ms-xl-2 font_dash1"><span class="text-dark text-bold">Student Name</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1 12:00 PM</span>
                                            </div>
                                            <div style="margin: auto 10;" class="ms-2 ms-sm-6 ms-md-8 ms-lg-3 ms-xl-3 font_dash1"><span class="text-dark text-bold">Assignment Title</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-book-reader me-2" style="font-size: 14px;"></i>Grade 1</span>
                                            </div>

                                            <a  href="" class="ms-4 mt-3 mt-sm-2 mt-lg-0 mt-md-0 mt-xl-0  ms-sm-6 ms-md-8 ms-lg-5 ms-xl-5" ><i class="fas fa-share-square font_dash2" style="font-size: 48px;"></i></a>

                                        </div>
                                    </div>
                                </div>


                                <div class="list-group mb-1">
                                    <div class="list-group-item">
                                        <div class="d-flex  py-1">
                                            <img src="../assets/img/home-decor-2.jpg" class="rounded-circle mt-3 mt-sm-3 mt-lg-0 mt-md-0 mt-xl-0" alt="Cinque Terre" width="50" height="50">
                                            <div style="margin: auto 10;" class="ms-sm-2 ms-md-4 ms-lg-2 ms-xl-2 font_dash1"><span class="text-dark text-bold">Student Name</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1 12:00 PM</span>
                                            </div>
                                            <div style="margin: auto 10;" class="ms-2 ms-sm-6 ms-md-8 ms-lg-3 ms-xl-3 font_dash1"><span class="text-dark text-bold">Assignment Title</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-book-reader me-2" style="font-size: 14px;"></i>Grade 1</span>
                                            </div>

                                            <a  href="" class="ms-4 mt-3 mt-sm-2 mt-lg-0 mt-md-0 mt-xl-0  ms-sm-6 ms-md-8 ms-lg-5 ms-xl-5" ><i class="fas fa-share-square font_dash2" style="font-size: 48px;"></i></a>

                                        </div>
                                    </div>
                                </div>


                                <div class="list-group mb-1">
                                    <div class="list-group-item">
                                        <div class="d-flex  py-1">
                                            <img src="../assets/img/home-decor-2.jpg" class="rounded-circle mt-3 mt-sm-3 mt-lg-0 mt-md-0 mt-xl-0" alt="Cinque Terre" width="50" height="50">
                                            <div style="margin: auto 10;" class="ms-sm-2 ms-md-4 ms-lg-2 ms-xl-2 font_dash1"><span class="text-dark text-bold">Student Name</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-clock me-2" style="font-size: 14px;"></i>2021/2/1 12:00 PM</span>
                                            </div>
                                            <div style="margin: auto 10;" class="ms-2 ms-sm-6 ms-md-8 ms-lg-3 ms-xl-3 font_dash1"><span class="text-dark text-bold">Assignment Title</span>
                                                <br/>
                                                <span  style="font-size: 15px;" class="text-primary font_dash"><i class="fas fa-book-reader me-2" style="font-size: 14px;"></i>Grade 1</span>
                                            </div>

                                            <a  href="" class="ms-4 mt-3 mt-sm-2 mt-lg-0 mt-md-0 mt-xl-0  ms-sm-6 ms-md-8 ms-lg-5 ms-xl-5" ><i class="fas fa-share-square font_dash2" style="font-size: 48px;"></i></a>

                                        </div>
                                    </div>
                                </div>





                            </div>


                        </div>

                    </div>

                </div>





            </div>

            <div class="col-lg-5">

                <div class="card card-body p-3" style="height: 100%;" >

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bolder">News</h5>
                            <div class="max-height-vh-80  h-80" style="overflow-y: auto;">


                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>


        <div class="card card-body mt-4">
            <div class="row  ">
                <h5 class="font-weight-bolder">Student Preformance overview</h5>
                <br/>
                <br/>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">

                            <p class="text-sm">
                                <i class="fas fa-chart-bar purplel-color"></i>
                                <span class="font-weight-bold">Term 1</span> in 2021
                            </p>

                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6  mt-3 mt-lg-0 mt-xl-0">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">


                            <p class="text-sm">

                                <i class="fas fa-chart-bar purpled-color"></i>
                                <span class="font-weight-bold"> Term 2</span> in 2021
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-line2" class="chart-canvas" height="300"></canvas>
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

        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#0a8228",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line2").getContext("2d");

        var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx3.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endsection
