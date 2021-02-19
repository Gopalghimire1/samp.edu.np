
<?php $__env->startSection('title',"GALARIES"); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/galary/add/">Gallery Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >No of Photos</th>
 
        <th></th><th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $galaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($galary->id); ?></td>
        <td><?php echo e($galary->title); ?></td>
        <td><?php echo e($galary->Photos()); ?></td>
        <td><a href="/admin/galary/edit/<?php echo e($galary->id); ?>/">Edit</a></td>
        <td><a href="/admin/galary/del/<?php echo e($galary->id); ?>/">Delete</a></td>
        <td><a href="/admin/galary/manage/<?php echo e($galary->id); ?>/">Manage Images</a></td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>