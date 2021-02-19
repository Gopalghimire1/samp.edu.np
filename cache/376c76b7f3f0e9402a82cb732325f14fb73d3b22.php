<?php $__env->startSection('title',"Notices"); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/sai.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Notice </h2>
              <ol class="breadcrumb text-left mt-1" style="background-color:transparent;">
                <li><a href="/" class="text-white">Home </a></li>
                <li class="active text-white">Pages </li>
                <li class="active text-white">Notices </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- section: notice -->
  <section class="bg-light">
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
          
          .notice-text{
            padding: 9px;
            line-height: 1;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: transform .2s;
            margin-left: 4rem;
            color: #0056b3;

          }
          .notice-text:hover{
            color: rgb(117, 117, 248);
            text-decoration: underline;
            transform: scale(1.0)
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
            <h3>List Of Notices</h3>
            <ul class="p-0">
              <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="notice-list">
                   <span class="s-n">
                      <?php echo e($k+1); ?>

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

        <div class="col-lg-3 col-sm-12 col-md-12 mb-2">
        </div>
      </div>

 </div>
</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>