
<?php $__env->startSection('title', 'Messaging'); ?>
<?php $__env->startSection('content'); ?>

<table class="table table-border cell-border compact">
    <thead>
    <tr>
        <th>#id</th>
        <th>Name</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Messages</th>
        <th>Address</th>
    </tr>   
    </thead>
    <tbody>
    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($contact->id); ?></td>
            <td><?php echo e($contact->firstname); ?> <?php echo e($contact->lastname); ?></td>
            <td><?php echo e($contact->phone); ?></td>
            <td><?php echo e($contact->email); ?></td>
            <td><?php echo e($contact->message); ?></td>
            <td><?php echo e($contact->address); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>