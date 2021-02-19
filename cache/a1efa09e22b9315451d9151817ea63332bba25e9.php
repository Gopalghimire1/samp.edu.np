
<?php $__env->startSection('title',"NEWS"); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/news/add/">News Add</a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Photo</th>
        <th data-sortable="true" >Date</th>
        <th data-sortable="true" >publisher</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($news->id); ?></td>
        <td><?php echo e($news->title); ?></td>
        <td><img src="/<?php echo e($news->photo); ?>" alt="" style="height:100px; width:200px;"></td>
        <td><?php echo e($news->published); ?></td>
        <td><?php echo e($news->publisher); ?></td>
        <td><a href="/admin/news/edit/<?php echo e($news->id); ?>/">Edit</a></td>
        <td><a href="/admin/news/del/<?php echo e($news->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>