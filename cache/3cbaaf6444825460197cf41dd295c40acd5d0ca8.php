<?php $__env->startSection('title', $page->title); ?>
<?php $__env->startSection('content'); ?>


    <section class="inner-header divider layer-overlay overlay-theme-colored-7"
        data-bg-img="/assets/img/page/<?php echo e($page->image); ?>" 
        style="background: url('/assets/img/page/<?php echo e($page->image); ?>');
        background-repeat: no-repeat;
        background-size: auto 100%;
        background-position: center;
    ">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36"><?php echo e($page->title); ?> </h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home </a></li>
                            <li class="active">Pages </li>
                            <li class="active"><?php echo e($page->title); ?> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section: notice -->
    <section class="bg-light">
        <div class="container">

            <?php echo $page->body; ?>

        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>