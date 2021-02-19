<?php $__env->startSection('title', "Faculties"); ?>
<?php $__env->startSection('content'); ?>
<?php
    $datas=\Models\Faculty::all();
?>
<div  style="padding:1rem 0rem">
    <form action="/admin/faculty/add/" method="POST">
        <input type="text" name="name" id="name" required placeholder="Enter Faculty Name">
        
        <input type="submit" style="margin-top: 1rem;" class="button primary" value="Add Faculty">
    </form>
</div>
<hr>
<h1 style="padding: 0px 10px;font-weight:400;">Faculty List</h1>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Name</th>
     <th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($notice->id); ?></td>
        <td><?php echo e($notice->name); ?></td>
   
        <td><a href="/admin/faculty/del/<?php echo e($notice->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>