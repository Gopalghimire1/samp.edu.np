<?php
$attendancedata = $student->AttendanceOverview();
$resultOverview = $student->resultOverview();
?>

@if ($student->isregisterd == 1)
    <div class="row">
        <div class="col-md-6">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);">
                    <canvas id="attendancepie{{ $student->id }}"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Total Days: {{ $attendancedata[0] }} days
                </div>
            </div>
            <div style="padding:5px;width:calc(50% - 10px);display:inline-block;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Present: {{ $attendancedata[1] }} days
                </div>
            </div>
            <div style="padding:5px;width:calc(50% - 10px);display:inline-block;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Absent: {{ $attendancedata[2] }} days
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Appeared in {{ $resultOverview[1] }} Exam
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Passed {{ $resultOverview[2] }} Exam
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Failed {{ $resultOverview[3] }} Exam
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Max Percentage:
                    @if ($resultOverview[4] == 0)
                        N/A
                    @else
                        {{ $resultOverview[4] }}%
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div style="padding:5px;">
                <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                    Absent In Exams:{{ $resultOverview[3] }} Days
                </div>
            </div>
        </div>
    </div>
@else
<a href="/student/academics/" class="btn btn-primary"> Proceed to Academic Record <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
<div class="row">

    <div class="col-md-6">
        <strong>Name : </strong>
        {{ $student->name }}
    </div>
    <div class="col-md-6">

        {{ $student->name_dev }}
    </div>
    <div class="col-md-6">
        <strong>Father Name : </strong>
        {{ $student->fathername }}
    </div>
    <div class="col-md-6">
        <strong>Mother Name : </strong>
        {{ $student->mothername }}
    </div>
    <div class="col-md-6">
        <strong>Province : </strong>
        {{ $student->province }}
    </div>
    <div class="col-md-6">
        <strong>District : </strong>
        {{ $student->District }}
    </div>
    <div class="col-md-12">
        <strong>Municipality : </strong>
        {{ $student->mun }}, ward no {{ $student->wardno }}
    </div>
    <div class="col-md-6">
        <strong>Contactno : </strong>{{ $student->phone }}
    </div>
    <div class="col-md-6">
        <strong>Email : </strong>{{ $student->email }}
    </div>
    <div class="col-md-4">
        <strong>Gender : </strong>{{ $student->gender }}

    </div>
    <div class="col-md-4">
        <strong>Religion : </strong>{{ $student->religion }}

    </div>
    <div class="col-md-4">
        <strong>Caste : </strong>{{ $student->caste }}
    </div>
</div>
@endif
