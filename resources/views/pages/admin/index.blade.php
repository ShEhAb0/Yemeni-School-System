@extends('pages.admin.layouts.admin-dashboard')
@section('navbar')
    <div >
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>

    </div>
@endsection
@section('content')

    <div class="container-fluid py-4">
        <div class="row text-center">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold"> Students Number</p>
                                    <h5 class="font-weight-bolder mb-0">


                                        {{$students}}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Teachers Number</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$teachers}}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Grades Number</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$grades}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
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

                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="font-weight-bolder">News</h5>
                                <div class="d-flex flex-column card mt-2" style="padding: 20px;background-color: #e4e9ff;">
                                    @if($news->count() > 0)

                                        @foreach($news as $n)
                                            <p class="mb-1 pt-2 text-bold">Published at : {{$n->created_at}} </p>
                                            <h5 class="font-weight-bolder">News Title: {{$n->title}}</h5>
                                            <p class="mb-5">{{substr($n->description , 0 , 1000)}} {{strlen($n->description) > 50 ? "" : ""}}</p>
                                        @endforeach
                                </div>

                                @else
                                    <div class="text-center">
                                        <p class="h5 text-danger">There are no news ..!</p>
                                    </div>
                                @endif



                            </div>

                        </div>
                    </div>

            </div>
{{--                <div class="card z-index-2">--}}
{{--                    <div class="card-header pb-0">--}}
{{--                        <h6>School Preformance overview</h6>--}}
{{--                        <p class="text-sm">--}}
{{--                            <i class="fa fa-arrow-up text-success"></i>--}}
{{--                            <span class="font-weight-bold">4% more</span> in 2021--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="card-body p-3">--}}
{{--                        <div class="chart">--}}
{{--                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

{{--            <div class="col-lg-4 mb-lg-0 mb-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body p-3">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <h5 class="font-weight-bolder">News</h5>--}}
{{--                                <div class="d-flex flex-column card mt-2" style="padding: 20px;background-color: #e4e9ff;">--}}
{{--                                    @if($news->count() > 0)--}}

{{--                                    @foreach($news as $n)--}}
{{--                                        <p class="mb-1 pt-2 text-bold">Published at : {{$n->created_at}} </p>--}}
{{--                                        <h5 class="font-weight-bolder">News Title: {{$n->title}}</h5>--}}
{{--                                        <p class="mb-5">{{substr($n->description , 0 , 1000)}} {{strlen($n->description) > 50 ? "" : ""}}</p>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}

{{--                                @else--}}
{{--                                    <div class="text-center">--}}
{{--                                        <p class="h5 text-danger">There are no news ..!</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}



{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/chartjs.min.js')}}"></script>
    <script src="{{asset('/js/soft-ui-dashboard.js')}}"></script>
{{--    <script>--}}

{{--        var ctx2 = document.getElementById("chart-line").getContext("2d");--}}

{{--        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);--}}

{{--        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');--}}
{{--        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');--}}
{{--        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors--}}

{{--        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);--}}

{{--        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');--}}
{{--        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');--}}
{{--        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors--}}

{{--        new Chart(ctx2, {--}}
{{--            type: "line",--}}
{{--            data: {--}}
{{--                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],--}}
{{--                datasets: [{--}}
{{--                    label: "Mobile apps",--}}
{{--                    tension: 0.4,--}}
{{--                    borderWidth: 0,--}}
{{--                    pointRadius: 0,--}}
{{--                    borderColor: "#0a8228",--}}
{{--                    borderWidth: 3,--}}
{{--                    backgroundColor: gradientStroke1,--}}
{{--                    fill: true,--}}
{{--                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],--}}
{{--                    maxBarThickness: 6--}}

{{--                },--}}
{{--                    {--}}
{{--                        label: "Websites",--}}
{{--                        tension: 0.4,--}}
{{--                        borderWidth: 0,--}}
{{--                        pointRadius: 0,--}}
{{--                        borderColor: "#3A416F",--}}
{{--                        borderWidth: 3,--}}
{{--                        backgroundColor: gradientStroke2,--}}
{{--                        fill: true,--}}
{{--                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],--}}
{{--                        maxBarThickness: 6--}}
{{--                    },--}}
{{--                ],--}}
{{--            },--}}
{{--            options: {--}}
{{--                responsive: true,--}}
{{--                maintainAspectRatio: false,--}}
{{--                plugins: {--}}
{{--                    legend: {--}}
{{--                        display: false,--}}
{{--                    }--}}
{{--                },--}}
{{--                interaction: {--}}
{{--                    intersect: false,--}}
{{--                    mode: 'index',--}}
{{--                },--}}
{{--                scales: {--}}
{{--                    y: {--}}
{{--                        grid: {--}}
{{--                            drawBorder: false,--}}
{{--                            display: true,--}}
{{--                            drawOnChartArea: true,--}}
{{--                            drawTicks: false,--}}
{{--                            borderDash: [5, 5]--}}
{{--                        },--}}
{{--                        ticks: {--}}
{{--                            display: true,--}}
{{--                            padding: 10,--}}
{{--                            color: '#b2b9bf',--}}
{{--                            font: {--}}
{{--                                size: 11,--}}
{{--                                family: "Open Sans",--}}
{{--                                style: 'normal',--}}
{{--                                lineHeight: 2--}}
{{--                            },--}}
{{--                        }--}}
{{--                    },--}}
{{--                    x: {--}}
{{--                        grid: {--}}
{{--                            drawBorder: false,--}}
{{--                            display: false,--}}
{{--                            drawOnChartArea: false,--}}
{{--                            drawTicks: false,--}}
{{--                            borderDash: [5, 5]--}}
{{--                        },--}}
{{--                        ticks: {--}}
{{--                            display: true,--}}
{{--                            color: '#b2b9bf',--}}
{{--                            padding: 20,--}}
{{--                            font: {--}}
{{--                                size: 11,--}}
{{--                                family: "Open Sans",--}}
{{--                                style: 'normal',--}}
{{--                                lineHeight: 2--}}
{{--                            },--}}
{{--                        }--}}
{{--                    },--}}
{{--                },--}}
{{--            },--}}
{{--        });--}}
{{--    </script>--}}
@endsection
