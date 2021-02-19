
<?php $__env->startSection('title',"About"); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="/asset/css/zabuto_calendar.min.css">

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
  <div class="container pt-120 pb-60">
    <!-- Section Content -->
    <div class="section-content">
      <div class="row"> 
        <div class="col-md-6">
          <h2 class="text-white font-36">About us </h2>
          <ol class="breadcrumb text-left mt-10 white">
            <li><a href="/">Home</a></li>
            <li class="active">Pages</li>
            <li class="active">About us  </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
 <div class="container" >
    <!-- <div class="row" style="margin-top:3rem; margin-bottom:3rem;">-->
    <!--<div class="col-md-3">-->
           
                    <!-- Card Regular -->
    <!--                <div class="card card-cascade">-->
            
    <!--                  
                     
    <!--                </div>-->
                    <!-- Card Regular -->
            
                  
    <!--</div>-->
    <!--<div class="col-md-8">-->
            
    <!--</div>-->
    
     <?php
            $aboutus=\Models\Aboutus::first();
            $page='';
            if($aboutus!=null){
                $page=$aboutus->page;
            }
    ?>
    <?php echo $page; ?>

 </div>
 </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>