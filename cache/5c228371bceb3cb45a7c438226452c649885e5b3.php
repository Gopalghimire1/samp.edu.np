
<?php $__env->startSection('title',"Student List"); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/stdlist/add/"> Add STD list </a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Files</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $studentlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($d->title); ?></td>
              <td><a href="/<?php echo e($d->file); ?>">View</a></td>
              <td>
                  <a href="/admin/stdlist/del/<?php echo e($d->id); ?>/">Delete</a>
              </td>
          </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>