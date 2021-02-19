<?php $__env->startSection('title', 'HOME'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.landing.intro', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/asset/css/landingpage2.css" crossorigin="anonymous">
   

    <div class="section">
        <div class="first-container">
            <div class="container c-1">
                    <div class="row">
                        <div class="col-md-3 pt-4 pt-md-0">
                            <div class="quicklinks">
                                <div class="title">
                                    Quick Links
                                </div>
                                <div class="links">
                                    <ul class="p-0">
                                        <li>
                                            <a href="/message/24/">Message form chairperson</a>
                                        </li>
                                        <li>
                                            <a href="/message/25/">Message form principal</a>
                                        </li>
                                        <li>
                                            <a href="/message/26/">What is KPKSG</a>
                                        </li>
                                        <li>
                                            <a href="/message/27/">What is SAMP</a>
                                        </li>
                                        <li>
                                            <a href="/news/">Latest News</a>
                                        </li>
                                        <li>
                                            <a href="/notices/">Latest Notice</a>
                                        </li>
                                        <li>
                                            <a href="/aboutus/">Know about us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4 pt-md-0">
                            <div class="min-about">
                                <h1 class="text-center text-white pb-4">
                                    Welcome To Collage
                                </h1>
                                <p class="pb-4">
                                    
                                </p>
                                <div class="text-center">
                                    <a href="/aboutus/" class="btn btn-about">About Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pt-md-0">
                            <?php $__currentLoopData = \Models\Member::take(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="" >
                                    <div class="row member" >
                                        <div class="col-3 col-md-4 pr-0">
                                            <img class="w-100" src="\assets\img\page\<?php echo e($member->image); ?>">
                                        </div>
                                        <div class="col-9 col-md-8 pl-0">
                                            <div class="name"><?php echo e($member->name); ?></div>
                                            <div class="desig">
                                                <?php echo e($member->desig); ?>

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                       
                    </div>
                    
                    
                    <div class="courses ">
                        <div class="title">
                            Our Courses
                        </div>
                        <div class="course-list">
                            <div class="row">
                                <div class="col-md-8 " style="position:relative;">
                                    <?php
                                        $i=0;
                                    ?>
                                    <?php $__currentLoopData = \Models\Page::where('type', course)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="course cc_<?php echo e($item->id); ?> <?php echo e($i==0?'active':''); ?>">
                                            <img src="/assets/img/page/<?php echo e($item->image); ?>" alt="">
                                        </div>
                                        <?php
                                            $i+=1;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                        $i=0;
                                    ?>
                                    <?php $__currentLoopData = \Models\Page::where('type', course)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="coursetitle cc_<?php echo e($item->id); ?> <?php echo e($i==0?'active':''); ?>" onclick="showcc(<?php echo e($item->id); ?>);">
                                            <?php echo e($item->title); ?>

                                        </div>
                                        <?php
                                            $i+=1;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-8">
                            <div class="card shadow p-0">
                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#Notices" role="tab"
                                            aria-controls="home" aria-selected="true">
                                            <div>
                                                Latest Notice
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#resuts" role="tab"
                                            aria-controls="home" aria-selected="true">
                                            <div>
                                                Results
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <style>
                                    
                          
                                    @media  only screen and (max-width: 768px){
                                      .notice-text>a{
                                        margin-left: 1rem;
                                      }
                                    }
                                    
                                </style>
                                <div class="tab-content" id="myTabContent" >
                                    <div class="tab-pane  active" id="Notices" role="tabpanel" aria-labelledby="home-tab">
                                    
                                        <?php if(\Models\Notice::count()==0): ?>
                                        <img src="/assets/img/no/notice.png" alt="" srcset="" style="width:100%;">
                                            
                                        <?php else: ?>
                                            <div class="row">

                                            <div class="col-md-12 col-sm-12 h-100">
                                                <?php
                                                    $sn=1;
                                                ?>
                                                <ul class="p-0">
                                                    <?php $__currentLoopData = \Models\Notice::orderBy('created_at', 'desc')->take(5)->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                                    <li class="notice-list">
                                                        <span class="s-n">
                                                            <?php echo e($sn++); ?>

                                                        </span>
                                                        <div class="notice-text">
                                                        <a href="/notice/single/<?php echo e($notice->id); ?>/"><?php echo e($notice->title); ?></a>
                                                            <div class="date">
                                                            <?php echo e($notice->published); ?>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                </ul>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="/notices/"class="btn btn-secondary " style="background: #202C45">View all Notices</a>
                                            </div>
                                        <?php endif; ?>
                                        
            
                                    </div>
                                
                                    <div class="tab-pane " id="resuts" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <?php if(\Models\Rresult::count() ==  0): ?>
                                            <img src="/assets/img/no/result.png" alt="" srcset="" style="width:100%;">
                                            <?php else: ?>
                                            <?php $__currentLoopData = \Models\Rresult::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-12 col-sm-12 h-100">
                                                <div class="p-1">
                                                    <h4 style="font-family: 'Roboto'; font-size: 18px;font-weight:500; display:flex;justify-content: space-between;"><a
                                                        href="/result/detail/<?php echo e($result->id); ?>/"><?php echo e($result->title); ?> </a>
                                                        <span style="float: right;">
                                                            <a href="/result/detail/<?php echo e($result->id); ?>/" style="font-size: 14px;">View Detail</a>
                                                        </span>
                                                    </h4>
                                                </div>
                                                
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php if(\Models\News::count()==0): ?>
                                        <img src="/assets/img/no/news.png" alt="" srcset="" style="width:100%;">
                                    <?php else: ?>
                                        <div class="row row-eq-height">

                                            


                                            <?php $__currentLoopData = \Models\News::orderBy('created_at', 'desc')->take(8)->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <div class="post-thumb thumb" style="max-height:75px;overflow:hidden;border-radius:5px;">
                                                            <img src="/<?php echo e($new->photo); ?>" alt="" class="w-100" >
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <h6 class="entry-title text-white text-uppercase m-0 "><a
                                                            href="/news/<?php echo e($new->id); ?>/"><?php echo e($new->title); ?> </a></h6>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="text-center">
                                            <a href="/news/"class="btn btn-secondary " style="background: #202C45">View all News</a>
                                        </div>
                                    <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-4 ">
                            <div class="shadow minisection">
                                <div class="minisection-title">
                                        Events
                                </div>
                                <div class="events">
                                    <ul>
                                        <?php $__currentLoopData = \Models\Event::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="event">
                                                <div class="event-title">
                                                    <?php echo e($event->title); ?>

                                                </div>
                                                <div>
                                                    <?php echo e($event->eventdate); ?>

                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="shadow minisection">
                                <div class="minisection-title">
                                        Important Links
                                </div>
                                <div class="imp-link">
                                    <div class="links">
                                        <ul class="p-0">
                                            <li>
                                                <a href="/message/24/">Message form chairperson</a>
                                            </li>
                                            <li>
                                                <a href="/message/25/">Message form principal</a>
                                            </li>
                                            <li>
                                                <a href="/message/26/">What is KPKSG</a>
                                            </li>
                                            <li>
                                                <a href="/message/27/">What is SAMP</a>
                                            </li>
                                            <li>
                                                <a href="/news/">Latest News</a>
                                            </li>
                                            <li>
                                                <a href="/notices/">Latest Notice</a>
                                            </li>
                                            <li>
                                                <a href="/aboutus/">Know about us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="shadow minisection">
                                <div class="minisection-title">
                                        Latest News
                                </div>
                                <div class="imp-link">
                                    <div class="links">
                                        <ul class="p-0">
                                            <?php $__currentLoopData = \Models\News::orderBy('created_at', 'desc')->take(8)->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="/news/<?php echo e($new->id); ?>/"><?php echo e($new->title); ?> </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      
    </div>
    <div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script1'); ?>
    <script>
        document.addEventListener('scroll', function(e) {
            lastKnownScrollPosition = window.scrollY;
            console.log(lastKnownScrollPosition);
            if(lastKnownScrollPosition>200){
                $('#header-nav').addClass('header-top1');
            }else{
                $('#header-nav').removeClass('header-top1');

            }
        });
        function showcc(id){
            $('.course').removeClass('active');
            $('.coursetitle').removeClass('active');
            $('.cc_'+id).addClass('active');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script2'); ?>
    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="/assettheme1/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assettheme1/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/assettheme1/js/extra-rev-slider-new.js"></script>

    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
                                  (Load Extensions only on Local File Systems ! 
                                   The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>

    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>


    <script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.video.min.js">
    </script>
    <script>
         $(window).on('load',function(){
            var delayMs = 1500; // delay in milliseconds
        
            setTimeout(function(){
                $('#exampleModalCenter').modal('show');
            }, delayMs);
         });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>