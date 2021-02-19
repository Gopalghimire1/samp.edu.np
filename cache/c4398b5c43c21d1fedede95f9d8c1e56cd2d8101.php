
<?php $__env->startSection('title', 'Admission Openings'); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $datas=\Models\Openadmission::all();
    ?>
    <br>
    <h4 style="padding: 0px 10px;font-weight:400;">
        Admission Openings


        <a href="/admin/opad/add/" class="button primary" style="font-size: 14px;">Add New</a>


        </span>
    </h4>
    <table class="table" >
        <thead>
            <tr>
                <th data-sortable="true" data-sort-dir="asc">#id</th>
                <th data-sortable="false">message</th>
                <th data-sortable="false">subjects</th>
                <th data-sortable="false">Types</th>
                <th data-sortable="true">Fiscal year</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data->id); ?></td>
                    <td>
                        <div style="max-width:200px; word-wrap: break-word;"><?php echo e($data->message); ?></div>
                    </td>
                    <td><div style="max-width:200px; overflow-wrap: break-word;"><?php echo e($data->subject); ?></div></td>
                    <td><?php echo e($data->types); ?></td>
                    <td><?php echo e($data->ay); ?></td>
                    <?php if($data->enabled == 0): ?>
                        <td><a href="/admin/opad/open/<?php echo e($data->id); ?>/">Open</a></td>

                    <?php else: ?>
                        <td><a href="/admin/opad/close/<?php echo e($data->id); ?>/">Close</a></td>

                    <?php endif; ?>
                    <td>
                        <a href="/admin/admission/selective/<?php echo e($data->id); ?>/">Applications (<?php echo e($data->listCount()); ?>)</a>
                        <br>
                        <a href="/admin/admission/selective/<?php echo e($data->id); ?>/status/0/">Pending (<?php echo e($data->pendingCount()); ?>)</a>
                        <br>
                        <a href="/admin/admission/selective/<?php echo e($data->id); ?>/status/1/">Accepted (<?php echo e($data->activeCount()); ?>)</a>
                        <br>
                        <a href="/admin/admission/selective/<?php echo e($data->id); ?>/status/2/">Rejected (<?php echo e($data->cancelCount()); ?>)</a>
                        <br>
                        <a href="/admin/opad/edit/<?php echo e($data->id); ?>/">Edit</a>|
                        <a href="/admin/opad/del/<?php echo e($data->id); ?>/">Delete</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>