<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <a href="/admin/logout/" style="float:right;"><button class="button warning mini rounded">Logout</button></a>
</div>

<div class="row">

   
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>