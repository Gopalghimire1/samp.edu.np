
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $datas=\Models\Page::where('type',$type)->get();
    ?>
    <h1 style="padding: 0px 10px;font-weight:400;">
        <?php echo e($title); ?>

        <span style="padding-left:1rem">
            <?php if($type == course): ?>
                <a href="/admin/course/add/" class="button primary" style="font-size: 14px;">Add New</a>
            <?php else: ?>
                <?php if($type == feature): ?>
                    <a href="/admin/feature/add/" class="button primary" style="font-size: 14px;">Add New</a>


                <?php else: ?>
                    <a href="/admin/message/add/" class="button primary" style="font-size: 14px;">Add New</a>

                <?php endif; ?>
            <?php endif; ?>
        </span>
    </h1>
    <table class="table" data-role="table">
        <thead>
            <tr>
                <th data-sortable="true" data-sort-dir="asc">#id</th>
                <th data-sortable="true">title</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($notice->id); ?></td>
                    <td><?php echo e($notice->title); ?></td>
                    <td><a href="/admin/page/edit/<?php echo e($notice->id); ?>/">Edit</a></td>
                    <td><a href="/admin/page/del/<?php echo e($notice->id); ?>/">Delete</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>