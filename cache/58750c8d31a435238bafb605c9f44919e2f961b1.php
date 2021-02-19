
<?php $__env->startSection('title',"TEACHERS"); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/teacher/add/">Teacher Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Name</th>
        <th data-sortable="true" >Adress</th>
        <th data-sortable="true" >Email</th>
        <th data-sortable="true" >Phone no</th>
        <th data-sortable="true" >Education</th>
        


        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($teacher->id); ?></td>
        <td><?php echo e($teacher->name); ?></td>
        <td><?php echo e($teacher->adress); ?></td>
        <td><?php echo e($teacher->email); ?></td>
        <td><?php echo e($teacher->phone); ?></td>
        <td><?php echo e($teacher->education); ?></td>
        <td><a href="/admin/teacher/edit/<?php echo e($teacher->id); ?>/">Edit</a></td>
        <td><a href="/admin/teacher/del/<?php echo e($teacher->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>