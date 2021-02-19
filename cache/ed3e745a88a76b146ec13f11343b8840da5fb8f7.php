
<?php $__env->startSection('title', 'Panel'); ?>
<?php $__env->startSection('content'); ?>
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
            <?php echo $__env->make('studentpanel.alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3" style="padding:5px;">
                <?php echo $__env->make('studentpanel.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-8">
                <?php echo $__env->make('studentpanel.studentoverview',['student'=>$student], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('studentpanel.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('studentpanel.changepass', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <script>
        window.onload = function() {

            <?php
            $attendancedata = $student->AttendanceOverview(); ?>

            var ctx = document.getElementById('attendancepie<?php echo e($student->id); ?>');
            var myChart<?php echo e($student->id); ?> = new Chart(ctx, {
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>