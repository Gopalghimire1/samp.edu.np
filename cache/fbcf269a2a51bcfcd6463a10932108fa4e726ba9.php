<?php $__env->startSection('title',"Events"); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="/asset/css/zabuto_calendar.min.css">
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Events</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Events</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    <div class="row" style=" margin-bottom:3rem;">
        <div class="col-md-8 col-sm-12" style="padding :20px 0px ;margin-top:3rem;">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-md-2">
                            <div style="background-color:#2196F3;color:white;padding:5px 10px;font-size: 20px;border-radius: 5px;">
                            <p ><?php echo e($event->getdate()->format('F')); ?></p>
                            <p style="text-align:center;background-color: white;color:#2196F3;padding:10px 0px;border-radius: 5px;font-size: 15px;">
                               <b> <?php echo e($event->getdate()->format('d')); ?></b>
                            </p>
                            </div>
                        </div>
                        <div class="col-md-10" >
                            <h2 class="text-secondary font-weight-bold" style="text-align: left;border-bottom: 1px #bfbfbf solid;"><?php echo e($event->title); ?></h2>
                        <div style="color:#2196F3"><i class="fas fa-map-marker-alt"></i><span style="margin:0px 10px;"> <?php echo e($event->adress); ?> </span>
                            <i class="fas fa-clock"></i> <span style="margin:0px 10px;"><?php echo e($event->eventtime); ?></span>
                        </div>
                            <div style="text-align: justify;
                            text-justify: inter-word;padding: 0;overflow: hidden;">
                            <?php echo e($event->description); ?>

                        </div>
                        
                        </div>
                    </div>
                    <hr class="my-5">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="col-md-4 col-sm-12">
            <div id="cal"></div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="/asset/js/zabuto_calendar.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#cal").zabuto_calendar({ data: [
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {date:"<?php echo e($event->eventdate); ?>",
            badge: true, 
            title:"<?php echo e($event->title); ?>",
             body: "<?php echo e(trim($event->description)); ?>",
             footer:'<div style="color:#2196F3"><i class="fas fa-map-marker-alt"></i><span style="margin:0px 10px;"> <?php echo e($event->adress); ?> </span><i class="fas fa-clock"></i> <span style="margin:0px 10px;"><?php echo e($event->eventtime); ?></span></div>',
             modal:true,
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ] });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>