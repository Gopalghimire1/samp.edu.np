<?php
  $p=new \Controllers\AuthManager();
  $parent=$p->getUser();
?>
<style>
    .list-group-item{
      cursor:pointer;
    }
    .round_btn{
      border:1px white solid;color:white;background:#000000;height:45px;width:45px;border-radius:25px;padding:5px;margin-left:calc(100% - 55px);
    }
    .round_btn:hover{
      color:black;
      background:white;
    }
  </style>
<div  style="border-radius:10px;box-shadow: 2px 3px 13px 3px rgba(0,0,0,0.75);">
  <div style="background:#5261C5;min-height:100px;padding:50px 0 20px 20px;">
    <h4 style="color:white;text-align:left;margin-bottom:1px;">
        {{$parent->name}}
    </h4>
    <div style="color:white;text-align:left;margin-bottom:10px;">
        {{$parent->adress}}, {{$parent->phone}}
    </div>
    <button class="round_btn" data-toggle="modal"  data-target="#changepassword">
    <i class="fa fa-key" aria-hidden="true"></i>
    </button>
  </div>
  
  <div style="min-height:200px;padding-top:15px;padding-bottom:40px;">
  <ul class="list-group" >
    <li class="list-group-item" style="border-top:0px;"><a href="/parent/" height:>Account</a></li>
    <li class="list-group-item"><a href="/parent/result/" height:>Result</a></li>
    <li class="list-group-item"><a href="/parent/attendance/" height:>Attendance</a></li>
    <li class="list-group-item"><a href="/parent/fees/" height:>Fees</a></li>
    <li class="list-group-item"><a href="/parent/logout/" height:>Logout</a></li>
  </ul>
  </div>
</div>