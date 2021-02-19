<?php
  $p=new \Controllers\AuthManager();
  $student=$p->getUser();
?>
<style>
    .list-group-item{
      cursor:pointer;
    }
    .round_btn_0{
      border:1px white solid;color:white;background:#000000;height:45px;width:45px;border-radius:25px;padding:1px; margin-left:180px;
    }
   
    .round_btn_0:hover{
      color:black;
      background:white;
    }
    .round_btn_1:hover{
      color:black;
      background:white;
    }
  </style>
<div  style="border-radius:10px;box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);">
  <div style="background:#5261C5;min-height:100px;padding:20px 0 20px 20px;">
    <img src="/assets/img/student/{{$student->photo}}" style="width:100%"/>
    <h4 style="color:white;text-align:left;margin-bottom:1px;">
        {{$student->name}}
    </h4>
    <div style="color:white;text-align:left;margin-bottom:10px;">
        {{$student->address}}
        <br>
         {{$student->phone}}
    </div>

    <button class="round_btn_0" data-toggle="modal"  data-target="#changepassword">
    <i class="fa fa-key" aria-hidden="true"></i>
    </button>
  </div>
  
  <div style="min-height:200px;padding-top:15px;padding-bottom:40px;">
  <ul class="list-group" >
    @if ($student->isregistered==1)
    <li class="list-group-item" style="border-top:0px;"><a href="/student/" height:>Account</a></li>
    <li class="list-group-item"><a href="/student/result/" height:>Result</a></li>
    <li class="list-group-item"><a href="/student/attendance/" height:>Attendance</a></li>
    <li class="list-group-item"><a href="/student/fees/" height:>Fees</a></li>
    <li class="list-group-item"><a href="/student/notes/" height:>Notes</a></li>
    <li class="list-group-item"><a href="/student/mocktest/" height:>Mock Test</a></li>
    @endif
    <li class="list-group-item"><a href="/student/academics/" height:>Academic Record</a></li>
    <li class="list-group-item"><a href="/student/uploads/" height:>Uploads</a></li>
    @if ($student->isregistered==1)
    <li class="list-group-item"><a href="/student/admissionform/" height:>Admission</a></li>  
    @endif
    <li class="list-group-item"><a href="/student/logout/" height:>Logout</a></li>
  </ul>
  </div>
</div>