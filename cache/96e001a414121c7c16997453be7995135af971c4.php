<?php $__env->startSection('title', 'Addmission Request'); ?>
<?php $__env->startSection('content'); ?>
    <h4>Admission Request for <?php echo e($opad->title); ?>

        <?php if($status == 0): ?>
            (Pending)
        <?php elseif($status == 1): ?>
            (Verified)
        <?php elseif($status== 2): ?>
            (Canceled)
        <?php else: ?>
        <?php endif; ?>
    </h4>
    <hr />

    <div class="cell-md-12">

        <table class="table" data-role="table">
            <thead>
                <tr>
                    <th>Admission_id</th>
                    <th>title</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Subject</th>
                    <th>status</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div>
                                <span><?php echo e($l->id); ?></span>
                                <span><a href="/admin/admission/detail/<?php echo e($l->id); ?>/">Detail</a> </span>
                            </div>

                        </td>
                        <td><?php echo e($l->title); ?></td>
                        <td><?php echo e($l->student->name); ?></td>
                        <td><?php echo e($l->student->phone); ?></td>
                        <td><?php echo e($l->type); ?></td>
                        <td><?php echo e($l->subject); ?></td>
                        <td><?php echo e($l->status); ?></td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>