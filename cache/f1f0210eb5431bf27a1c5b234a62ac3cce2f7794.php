<?php $__env->startSection('title','ADD GALARY'); ?>
<?php $__env->startSection('content'); ?>

    <h4>Add Galary</h4>
    <hr/>
    <form method="post" >
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" placeholder="Enter Title"/>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="description"></textarea>
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" >
        </div>
    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>