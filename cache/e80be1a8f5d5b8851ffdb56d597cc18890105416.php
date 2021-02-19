<?php $__env->startSection('title', 'Member List'); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $datas=\Models\Member::all();
    ?>
    <br>
    <h4 style="padding: 0px 10px;font-weight:400;">
    


        <a href="/admin/member/add/" class="button primary" style="font-size: 14px;">Add Member</a>
        </span>
    </h4>
    <table class="table" data-role="table">
        <thead>
            <tr>
                <th data-sortable="true" data-sort-dir="asc">#id</th>
                <th data-sortable="true">Name</th>
                <th data-sortable="true">Designation</th>
                <th data-sortable="true">Image</th>
            
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data->id); ?></td>
                    <td>
                        <div style="max-width:200px;"><?php echo e($data->name); ?></div>
                    </td>
                    <td><?php echo e($data->desig); ?></td>
                    <td> <img src="/assets/img/page/<?php echo e($data->image); ?>" alt="" srcset="" style="max-width:200px;" ></td>
                    <td>
                        <a href="/admin/member/edit/<?php echo e($data->id); ?>/">Edit</a>|
                        <a href="/admin/member/del/<?php echo e($data->id); ?>/">Delete</a>
                    </td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>