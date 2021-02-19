<?php $__env->startSection('title',"EVENTS"); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/event/add/">Event Add</a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Photo</th>
        <th data-sortable="true" >Date</th>
        <th data-sortable="true" >Time</th>
        <th data-sortable="true" >Adress</th>    
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($event->id); ?></td>
        <td><?php echo e($event->title); ?></td>
        <td><img src="/<?php echo e($event->photo); ?>" alt="" style="height:100px; width:200px;"></td>
        <td><?php echo e($event->eventdate); ?></td>
        <td><?php echo e($event->eventtime); ?></td>
        <td><?php echo e($event->adress); ?></td>
        <td><a href="/admin/event/edit/<?php echo e($event->id); ?>/">Edit</a></td>
        <td><a href="/admin/event/del/<?php echo e($event->id); ?>/">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>