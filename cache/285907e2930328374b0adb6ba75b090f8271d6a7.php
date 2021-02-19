<?php $__env->startSection('title', 'Notices Single Page'); ?>
<?php $__env->startSection('content'); ?>


    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/sai.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">Notice</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home </a></li>
                            <li class="active">Pages </li>
                            <li class="active">Single Notice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section: notice -->
    <section class="bg-light">
        <div class="container">
            <!-- <div class="section-title text-center">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Latest <span class="text-theme-colored2">Notices</span></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                </div>
              </div>
            </div> -->
            <div class="row">
               
                <div class="col-md-12">
                    
                    <div class="feature-wrapper mb-30">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="/assets/img/page/<?php echo e($notice->image); ?>" title="click to view large" target="_blank">
                                    <img src="/assets/img/page/<?php echo e($notice->image); ?>" style="width:100%"/>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="feature-title-heading">
                                    <h3><?php echo e($notice->title); ?></h3>
                                    <span></span>
                                </div>
                                <div class="feature-text">
                                    <p><?php echo e($notice->description); ?></p>
                                </div>
                                <div style="padding:.7rem 0;">
                                    <small class="text-warning pull-left" style="color: #f80!important;"><i
                                            class="fa fa-calendar-plus-o" aria-hidden="true"></i> - <?php echo e($notice->published); ?></small>
                                    <small class="text-info pull-right" style="color: #f80!important;"><i class="fa fa-user-circle"
                                            aria-hidden="true"></i> - <?php echo e($notice->publisher); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <div class="container" style="padding-top:10px;padding-bottom: 10px; margin-top:3rem; margin-bottom:3rem;">
                <div class="list-group ">
                     <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="notice-design">
                        <div class="list-group-item list-group-item-action flex-column align-items-start" style="background-color: #24355C; border-color: transparent;">
                                    <div class="w-100 justify-content-between">
                                      <h5 class="mb-2 h5 text-center hr-text" style="color: #ffffff; font-family: noticeheader;"><?php echo e($notice->title); ?></h5>
                                    </div>
                                    <p class="mb-2 text-center" style="color: #ffffff; font-family: noticebody;">
                                      <?php echo e($notice->description); ?>

                                    </p>

                                    <small class="text-warning" style="text-align: left;"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> - <?php echo e($notice->published); ?></small>
                                  <small class="text-info" style="float: right; color: #f80!important;"><i class="fa fa-user-circle" aria-hidden="true"></i> - <?php echo e($notice->publisher); ?></small>
                          </div>      
                       </div>                        
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
    </div>
     -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>