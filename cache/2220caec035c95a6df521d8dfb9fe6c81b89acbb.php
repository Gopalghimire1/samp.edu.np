
<?php $__env->startSection('title',"NOTICE"); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/notice/add/">Notice Add</a>
</div>

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="false">image</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Date</th>
        <th data-sortable="true" >publisher</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($notice->id); ?></td>
        <td>
            <img src="/assets/img/page/<?php echo e($notice->image); ?>" alt="" srcset="" style="max-width:200px;" ></td>
        </td>
        <td>
            <?php echo e($notice->title); ?>

        </td>
        <td><?php echo e($notice->published); ?></td>
        <td><?php echo e($notice->publisher); ?></td>
        <td><a href="/admin/notice/edit/<?php echo e($notice->id); ?>/">Edit</a></td>
        <td><a href="/admin/notice/del/<?php echo e($notice->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>