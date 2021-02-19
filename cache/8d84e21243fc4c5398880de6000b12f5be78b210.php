<?php
$attendancedata = $student->AttendanceOverview();
$resultOverview = $student->resultOverview();
?>

<?php if($student->isregisterd == 1): ?>
    <div class="row">
        <div class="col-md-6">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);">
                    <canvas id="attendancepie<?php echo e($student->id); ?>"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Total Days: <?php echo e($attendancedata[0]); ?> days
                </div>
            </div>
            <div style="padding:5px;width:calc(50% - 10px);display:inline-block;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Present: <?php echo e($attendancedata[1]); ?> days
                </div>
            </div>
            <div style="padding:5px;width:calc(50% - 10px);display:inline-block;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Absent: <?php echo e($attendancedata[2]); ?> days
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Appeared in <?php echo e($resultOverview[1]); ?> Exam
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Passed <?php echo e($resultOverview[2]); ?> Exam
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Failed <?php echo e($resultOverview[3]); ?> Exam
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Max Percentage:
                    <?php if($resultOverview[4] == 0): ?>
                        N/A
                    <?php else: ?>
                        <?php echo e($resultOverview[4]); ?>%
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Absent In Exams:<?php echo e($resultOverview[3]); ?> Days
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
<a href="/student/academics/" class="btn btn-primary"> Proceed to Academic Record <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
<div class="row">

    <div class="col-md-6">
        <strong>Name : </strong>
        <?php echo e($student->name); ?>

    </div>
    <div class="col-md-6">

        <?php echo e($student->name_dev); ?>

    </div>
    <div class="col-md-6">
        <strong>Father Name : </strong>
        <?php echo e($student->fathername); ?>

    </div>
    <div class="col-md-6">
        <strong>Mother Name : </strong>
        <?php echo e($student->mothername); ?>

    </div>
    <div class="col-md-6">
        <strong>Province : </strong>
        <?php echo e($student->province); ?>

    </div>
    <div class="col-md-6">
        <strong>District : </strong>
        <?php echo e($student->District); ?>

    </div>
    <div class="col-md-12">
        <strong>Municipality : </strong>
        <?php echo e($student->mun); ?>, ward no <?php echo e($student->wardno); ?>

    </div>
    <div class="col-md-6">
        <strong>Contactno : </strong><?php echo e($student->phone); ?>

    </div>
    <div class="col-md-6">
        <strong>Email : </strong><?php echo e($student->email); ?>

    </div>
    <div class="col-md-4">
        <strong>Gender : </strong><?php echo e($student->gender); ?>


    </div>
    <div class="col-md-4">
        <strong>Religion : </strong><?php echo e($student->religion); ?>


    </div>
    <div class="col-md-4">
        <strong>Caste : </strong><?php echo e($student->caste); ?>

    </div>
</div>
<?php endif; ?>
