<?php 
          $attendancedata=$student->AttendanceOverview();
          $resultOverview=$student->resultOverview();
          
?>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse{{$student->id}}">{{$student->name}} | Class: {{$student->level()->name}}</a>
      </h4>
    </div>
    <div id="collapse{{$student->id}}" class="panel-collapse collapse">
      <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);">
                            <canvas id="attendancepie{{$student->id}}" ></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Total Days: {{$attendancedata[0]}} days
                        </div>
                    </div>
                    <div style="padding:5px;width:calc(50% - 10px);display:inline-block;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Present: {{$attendancedata[1]}} days
                        </div>
                    </div>
                    <div style="padding:5px;width:calc(50% - 10px);display:inline-block;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Absent: {{$attendancedata[2]}} days
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Appeared in {{$resultOverview[1]}} Exam
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Passed {{$resultOverview[2]}} Exam
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Failed {{$resultOverview[3]}} Exam
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                           Max Percentage:
                           @if($resultOverview[4]==0)
                            N/A
                           @else
                                {{$resultOverview[4]}}%
                           @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div style="padding:5px;">
                        <div style="box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);text-align:center;padding:20px;">
                            Absent In Exams:{{$resultOverview[3]}} Days
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
