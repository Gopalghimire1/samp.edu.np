<?php $__env->startSection('title', 'News'); ?>
<?php $__env->startSection('content'); ?>
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/sai.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">News </h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home </a></li>
                            <li class="active">Pages </li>
                            <li class="active">News</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: news -->
    <section id="blog" class="bg-silver-light">
        <div class="container">

            <style>
              .notice-list{
                list-style-type: none;
                border-top: 1px solid #efefef;
                border-bottom: 1px solid #efefef;
                height: 53px;
                margin-bottom: 1rem;
              }
              .s-n{
                background: #efefef;
                position: absolute;
                line-height: 1;
                font-size: 18px;
                font-weight: 500;
                text-align: center;
                width: 60px;
                padding: 17px;
              }
              
              .notice-text>a{
                padding: 9px;
                line-height: 1;
                font-weight: 700;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                transition: transform .2s;
                margin-left: 4rem;
                color: #0056b3;
    
              }
              .notice-text>a:hover{
                color: rgb(117, 117, 248);
                text-decoration: underline;
                transform: scale(1.0)
                font-weight: 800;
              }
              .date{
                font-size: 13px;
                text-align: end;
                margin-top: 5px;
                color: black;
                font-weight: 700;
              }
    
              @media  only screen and (max-width: 768px){
                .notice-text>a{
                  margin-left: 1rem;
                }
              }
              
          </style>
          <div class="row " style="background: white; padding:2rem;">
              <div class="col-lg-9 col-sm-12 col-md-12 ">
                <h3>List Of News</h3>
                <ul class="p-0">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                    <li class="notice-list">
                       <span class="s-n">
                          <?php echo e($k+1); ?>

                       </span>
                      <div class="notice-text">
                        <a href="/news/<?php echo e($new->id); ?>/"><?php echo e($new->title); ?></a>
                          <div class="date">
                            <?php echo e($new->published); ?>

                          </div>
                      </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </ul>
              </div>
    
            <div class="col-lg-3 col-sm-12 col-md-12 mb-2">
            </div>
          </div>
    
     </div>
            
    </section>

    <!-- <div class="container" style="padding-top:10px;padding-bottom: 10px; margin-top:3rem; margin-bottom:3rem;">
            <div class="list-group">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="notice-design">
                                            <div class="list-group-item list-group-item-action flex-column align-items-start" style="background-color: #24355C; border-color: transparent;">
                                                    <div class="w-100 justify-content-between">
                                                    <h5 class="mb-2 h5 text-center hr-text" style="color: #ffffff; font-family: noticeheader;"><?php echo e($new->title); ?></h5>
                                                    </div>
                                                            <p class="mb-2 text-center" style="color: #ffffff; font-family: noticebody;">
                                                            <?php echo e($new->news); ?>

                                                            </p>

                                                    <small class="text-warning" style="text-align: left;"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> - <?php echo e($new->published); ?></small>
                                            <small class="text-info" style="float: right; color: #f80!important;"><i class="fa fa-user-circle" aria-hidden="true"></i> - <?php echo e($new->publisher); ?></small>
                                            </div>      
                                    </div>     
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
    </div> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>