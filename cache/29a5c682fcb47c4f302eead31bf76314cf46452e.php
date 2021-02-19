
<?php $__env->startSection('title','Result'); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/result/add/">Result Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" >Title</th>
        <th data-sortable="true" >Publisher</th>
        <th data-sortable="true" >date</th>
        <th data-sortable="false" >File</th>
        
        

        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($r->title); ?></td>
        <td><?php echo e($r->publisher); ?></td>
        <td><?php echo e($r->date); ?></td>
        <td> <a href="/<?php echo e($r->file); ?>">Download</a></td>

        <td><a href="/admin/result/edit/<?php echo e($r->id); ?>/">Edit</a></td>
        <td><a href="/admin/result/del/<?php echo e($r->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>