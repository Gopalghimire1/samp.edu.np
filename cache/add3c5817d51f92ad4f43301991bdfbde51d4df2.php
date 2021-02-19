
<?php $__env->startSection('title','EDIT RESULT'); ?>
<?php $__env->startSection('content'); ?>

    <h4>Result Published</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" value="<?php echo e($result->title); ?>" required />
        </div>
        <div class="form-group">
            <label>Publisher</label>
            <input  name="publisher" type="text" value="<?php echo e($result->publisher); ?>" required/>
        </div>
        <div class="form-group">
                <label>Published Date</label>
                <input data-role="datepicker"  name="date" value="<?php echo e($result->date); ?>" >
        </div>
        <div class="form-group">
            <label for="category">Choose Exam Type</label>   
            <select name="examtype">
                <option value="">==== Choose Exam Type ====</option>
                <option value="1">First Terminal</option>
                <option value="2">Second Terminal</option>
                <option value="3">Third Terminal</option>
                <option value="4">Test</option>
            </select>         
        </div>

        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>File Or Image</p>
            <img src="/<?php echo e($result->file); ?>" style="height: 200px;" id="photo"/>
            <p><?php echo e($result->file); ?></p>
            <input type="file" name="file" data-role="file" onchange="readURL(this);" data-button-title="..." >
        </div>

        
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/result/list/'">
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