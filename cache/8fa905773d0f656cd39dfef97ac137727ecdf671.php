<?php $__env->startSection('title','EDIT NEWS'); ?>
<?php $__env->startSection('content'); ?>

    <h4>Edit News</h4>
    <hr/>
    <form method="post" >
        
        <div class="form-group">
            <label>Title</label>
        <input type="text"  name="title" placeholder="Enter Title" value="<?php echo e($news->title); ?>"/>
        </div>
        <div class="form-group">
            <label>Publisher</label>
            <input type="text"  name="publisher" placeholder="Enter Publisher" value="<?php echo e($news->publisher); ?>" />
        </div>
        <div class="form-group">
            <label>Date</label>
            <input data-role="datepicker"  name="published" value="<?php echo e($news->published); ?>">
        </div>
        <div class="form-group">
            <label>News</label>
            <textarea data-role="textarea" name="news">
                <?php echo e($news->news); ?>

            </textarea>
        </div>
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>Photo</p>
            <img src="/<?php echo e($news->photo); ?>" style="height: 200px;" id="photo"/>
            <input type="file" name="photo" data-role="file" onchange="readURL(this);" data-button-title="..." >
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/event/list/'">
        </div>
    </form>

    <script>
        function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
 
             reader.onload = function (e) {
                 $('#photo')
                     .attr('src', e.target.result);
             };
 
             reader.readAsDataURL(input.files[0]);
         }
     }
     </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>