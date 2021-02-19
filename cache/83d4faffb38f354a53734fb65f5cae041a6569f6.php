
<?php $__env->startSection('title','LIST SLIDER'); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/slider/add/">Slider Add</a>
</div>


<table class="table table-border cell-border" >
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Caption</th>
        <th data-sortable="false" >Sub Caption</th>
        <th data-sortable="false" >Button Text</th>
        <th data-sortable="false" >Image</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($slid->id); ?></td>
        <td><?php echo e($slid->caption); ?></td>
        <td><?php echo e($slid->subcaption); ?></td>
        <td><?php echo e($slid->button); ?></td>
        <td><img src="/<?php echo e($slid->image); ?>" alt="" style="height:100px; width:200px;"></td>
        <td><a href="/admin/slider/edit/<?php echo e($slid->id); ?>/">Edit</a></td>
        <td><a href="/admin/slider/del/<?php echo e($slid->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>