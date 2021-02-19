<?php $__env->startSection('title',"Download Page"); ?>
<?php $__env->startSection('content'); ?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7"  data-bg-img="/assets/img/bg2.jpg"">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">डाउन्लोड गर्नुहोस</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">मूल पृष्ठ </a></li>
                <li class="active">पृष्ठहरु </li>
                <li class="active">डाउन्लोड </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    <div class="row" style="margin-top:3rem; margin-bottom:3rem;" >

      <div  class="col-md-12">
        <h4 class="text-center">डाउन्लोड गर्नुहोस</h4>
        <hr>
        <table class="table table-bordered">
          <tr>
            <Th>मिति </Th>
            <th>सिर्षक </th>
            <th>जानकारी </th>
            <th>फायल</th>
          </tr>
          <tbody id="tableBody">
            <?php $__currentLoopData = $download; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($item->date); ?></td>
                  <td><?php echo e($item->title); ?></td>
                  <td><?php echo e($item->detail); ?></td>
                  <td><a href="/<?php echo e($item->file); ?>">डाउन्लोड</a></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>