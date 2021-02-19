
<?php $__env->startSection('title','EDIT DOWNLOAD ITEMS'); ?>
<?php $__env->startSection('content'); ?>

    <h4>EDIT DOWNLOAD ITEMS</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" value="<?php echo e($download->title); ?>" required/>
        </div>
       
        <div class="form-group">
            <label>Date</label>
            <input data-role="datepicker" value="<?php echo e($download->date); ?>"  name="date" required />
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="desc"> <?php echo e($download->detail); ?>"</textarea>
        </div>
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>Files</p>
            <input type="file" name="file" data-role="file" data-button-title="..." >
            <p><?php echo e($download->file); ?>"</p>
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/download/list/'">
        </div>
    </form>

    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>