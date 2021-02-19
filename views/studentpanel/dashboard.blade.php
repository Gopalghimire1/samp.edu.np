@extends('front.app')
@section('title', 'Panel')
@section('content')
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">Student Panel</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home</a></li>
                            <li class="active">Pages</li>
                            <li class="active">Panel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div>
            @include('studentpanel.alert')
        </div>
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3" style="padding:5px;">
                @include('studentpanel.menu')
            </div>
            <div class="col-md-8">
                @include('studentpanel.studentoverview',['student'=>$student])
            </div>
        </div>
    </div>

    @include('studentpanel.edit')
    @include('studentpanel.changepass')


    <script>
        window.onload = function() {

            <?php
            $attendancedata = $student->AttendanceOverview(); ?>

            var ctx = document.getElementById('attendancepie{{ $student->id }}');
            var myChart{{$student->id}} = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [{
                            {
                                $attendancedata[1]
                            }
                        }, {
                            {
                                $attendancedata[2]
                            }
                        }],
                        backgroundColor: [
                            window.chartColors.blue,
                            window.chartColors.red,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Present ',
                        'Absent '
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Attendance Chart',
                        position: "bottom",

                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });


        }

    </script>
@stop
