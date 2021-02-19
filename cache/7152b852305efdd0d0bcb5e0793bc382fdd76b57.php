
<?php $__env->startSection('title',"student list"); ?>
<?php $__env->startSection('content'); ?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">बिधार्थी को सुची </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">मूल पृष्ठ </a></li>
                <li class="active">पृष्ठहरु </li>
                <li class="active">बिधार्थी को सुची </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    <div class="row" style="margin-top:3rem; margin-bottom:3rem;" >

      <div  class="col-md-12">
        <h4 class="text-center">सुची डाउन्लोड गर्नुहोस </h4>
        <hr>
        <table class="table table-bordered">
          <tr>
            <th>सिर्षक </th>
            <th>कार्य </th>
          </tr>
          <tbody id="tableBody">
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($item->title); ?></td>
                  <td>
                      <a href="/<?php echo e($item->file); ?>">डाउन्लोड गर्नुहोस  </a> |
                      <a href="/students/<?php echo e($item->id); ?>/" target="_blank">अनलाईन हेर्नुहोस्  </a> 
                    </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>