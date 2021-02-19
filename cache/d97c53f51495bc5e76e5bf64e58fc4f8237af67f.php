<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <div class="preloader-dot-loading">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Click Here</div>
    </div>

    <!-- Header -->
    <header id="header" class="header modern-header modern-header-theme-colored">
        <div class="header-top  sm-text-center" style="background:#234282;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget text-white">
                            <i class="fa fa-clock-o text-white"></i> Open Time : Sunday - Friday :
                            <?php echo e(env('time', '5am - 5pm')); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <ul class="list-inline  text-right flip sm-text-center" style="font-size:12px;">

                                <li>
                                    <a class="text-white" href="/result/page/">Results </a>
                                </li>
                                <li>
                                    <a class="text-white" href="/download/">Download</a>
                                </li>
                                <li>
                                    <a class="text-white" href="/login/">Student Login</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle p-0 bg-light xs-text-center">
            <div class="container pt-20 pb-20">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="widget sm-text-center">

                            <a href="mailto:admin@gmail.com" class="font-12 text-gray text-uppercase">Mail</a>
                            <h5 class="font-13 text-black m-0">
                                
                                samp.org.np@gmail.com
                            </h5>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6">
                        <div class="widget text-center" style="margin-top: 0%;">
                            <a href="/"><img src="/assets/img/ss.png" alt=""></a>
                            
                            <p>
                                Jahada, Sisawanijahada, Morang
                    
                           
                            </p>
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="widget sm-text-center text-right">
                            <a href="tel:admin@gmail.com" class="font-12 text-gray text-uppercase">Call Us</a>
                            
                            
                            <h5 class="font-13 text-black m-0"> 021-570760  </h5>
                            <h5 class="font-13 text-black m-0"> 9852022209  </h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .header-nav-wrapper{
                transition: all 1s;
            }
            .header-top1{
                position: fixed !important;
                top:0px;
                left:0px;
                right:0px;
                margin: 0rem !important;
                background: #202C45;
            }
            
        </style>
        <div class="header-nav" >
            <div class="header-nav-wrapper navbascrolltofixed" id="header-nav">
                <div class="container">
                    <nav id="menuzord" class="menuzord green">
                        <ul class="menuzord-menu">
                            <li class="active"><a href="/">Home </a></li>
                            <li><a href="/notices/">Notice </a></li>
                            <li><a href="/news/">News </a></li>
                            <li>
                                <a href="#">Features </a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    <?php $__currentLoopData = \Models\Page::where('type', feature)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="/feature/<?php echo e($item->id); ?>/"><?php echo e($item->title); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Courses </a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    <?php $__currentLoopData = \Models\Page::where('type', course)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="/course/<?php echo e($item->id); ?>/"><?php echo e($item->title); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Faculties </a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    <?php $__currentLoopData = \Models\Faculty::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="/faculty/<?php echo e($item->id); ?>/"><?php echo e($item->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li><a href="/galary/">Gallery </a></li>
                            <li><a href="/student/register/">Admission</a></li>
                            <li>
                                <a href="/aboutus/">About us</a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    <li><a href="/contact/">Contact </a></li>
                                    <?php $__currentLoopData = \Models\Page::where('type', message)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="/message/<?php echo e($item->id); ?>/"><?php echo e($item->title); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>


                        </ul>
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
