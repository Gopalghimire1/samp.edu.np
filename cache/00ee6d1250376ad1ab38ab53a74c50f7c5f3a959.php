<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <!-- Metro 4 -->
    <link rel="stylesheet" href="/assets/css/metro-all.min.css">
    
    
    <style>
           
        .mobile{
          padding:0px 0px 0px 15px;
        }
       
    </style>
    <?php echo $__env->yieldContent('css'); ?>
  </head>
  <body>

  <div data-role="navview" style="">
    <div class="navview-pane" style="overflow-y: scroll; background:#3A448B; color:#ffffff; " >
    <?php echo $__env->make('back.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="navview-content" style="min-height:100vh;">
      <div>
        <br>
      </div>
     
      <div class="container">
         <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
</div>

    
<!-- 
<div class="row " >
  <div class="cell-md-2 cell-sm-12 mobile" style="min-height: 100vh;border-right:1px #dfdfdf solid;" >
<ul class="sidenav-m3 " style="width:100%;">
  <li><img src="/assets/img/p1.jpg" style="width:100%;" /></li>
 <li><a href="/admin/"><span class="mif-home icon"></span>Home</a></li>

 <li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/stds.png" style="height:24px;width:24px;">Slider</a>
  <ul class="d-menu" data-role="dropdown" >
      <li><a href="/admin/slider/add/"><span class="mif-add icon"></span> Add Slider</a></li>
      <li><a href="/admin/slider/list/"> List Sliders</a></li>
    </ul>
</li>

 <li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/stds.png" style="height:24px;width:24px;">Student</a>
  <ul class="d-menu" data-role="dropdown" >
      <li><a href="/admin/student/add/"><span class="mif-add icon"></span> Add Student</a></li>
      <li><a href="/admin/student/list/"> List Students</a></li>
    </ul>
</li>

<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/galary.png" style="height:24px;width:24px;">Gallery</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/galary/add/"><span class="mif-add icon"></span> Add Gallery</a></li>
      <li><a href="/admin/galary/list/">List Gallery</a></li>
  </ul>
</li>

<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/teacher.png" style="height:24px;width:24px;">Teacher</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/teacher/add/"><span class="mif-add icon"></span> Add Teacher</a></li>
      <li><a href="/admin/teacher/list/">List Teacher</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/exam.png" style="height:24px;width:24px;">Exam</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      
      <li><a href="/admin/exam/list/">List Exam</a></li>
  </ul>
</li>
<li class="stick-left ">
    <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/exam.png" style="height:24px;width:24px;">Notice</a>
    <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
        <li><a href="/admin/notice/add/"><span class="mif-add icon"></span> Add Notice</a></li>
        <li><a href="/admin/notice/list/">List Notice</a></li>
    </ul>
  </li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/event.png" style="height:24px;width:24px;">Events</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/event/add/"><span class="mif-add icon"></span> Add Event</a></li>
      <li><a href="/admin/event/list/">List Event</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/news.png" style="height:24px;width:24px;">News</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/news/add/"><span class="mif-add icon"></span> Add News</a></li>
      <li><a href="/admin/news/list/">List News</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/level.png" style="height:24px;width:24px;">Levels</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/level/add/"><span class="mif-add icon"></span> Add Student</a></li>
      <li><a href="/admin/level/list/">List Students</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/class.png" style="height:24px;width:24px;">Classrooms</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/classroom/add/"><span class="mif-add icon"></span> Add Classroom</a></li>
      <li><a href="/admin/classroom/list/">List Classroom</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/account.png" style="height:24px;width:24px;">Accounts</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/account/add/"><span class="mif-add icon"></span> Add Account</a></li>
      <li><a href="/admin/account/list/">List Accountn</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/account.png" style="height:24px;width:24px;">Notes</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/note/add/"><span class="mif-add icon"></span> Add Note</a></li>
      <li><a href="/admin/note/list/">List Notes</a></li>
  </ul>
</li>
<li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/account.png" style="height:24px;width:24px;">Academics</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
      <li><a href="/admin/academic/add/"><span class="mif-add icon"></span> Add Academic</a></li>
      <li><a href="/admin/academic/list/">List Academic</a></li>
  </ul>
</li>
<li class="stick-left ">
    <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/account.png" style="height:24px;width:24px;">Fee Structure</a>
    <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
        <li><a href="/admin/fee/add/"><span class="mif-add icon"></span> Add Fee Structure</a></li>
        <li><a href="/admin/fee/list/">List Fee Structure</a></li>
    </ul>
  </li>
  <li class="stick-left ">
  <a class="dropdown-toggle" href="#"><img class="icon" src="/assets/img/account.png" style="height:24px;width:24px;">Messages</a>
  <ul class="d-menu" data-role="dropdown" style="display: none;width:100%;">
     
      <li><a href="/admin/messages/">Messages</a></li>
  </ul>
</li>
</ul>

</div>
<div class="cell-md-10 cell-sm-12" style="min-height: 100vh;">
  <div  style="overflow-x: scroll;padding-top:15px;min-height: 100vh;">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
</div>
</div> -->


    <!-- jQuery first, then Metro UI JS -->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/metro.min.js"></script>
    <?php echo $__env->yieldContent('script'); ?>
    <?php 
    $h_set=new Controllers\AuthManager();
  ?>
  <?php if($h_set->isLoged()): ?>
  <script>
    
    axios.defaults.headers.common['session_key'] = '<?php echo e($h_set->getAuth()->session_key); ?>';
    // axios.defaults.headers.get['session_key'] = '<?php echo e($h_set->getAuth()->session_key); ?>';

  </script>
<?php endif; ?>
  </body>
</html>