<?php $__env->startSection('title','EDIT TEACHER'); ?>
<?php $__env->startSection('content'); ?>

    <h4>Edit Teacher</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label>Name</label>
        <input type="text"  name="name" placeholder="Enter Name"  value="<?php echo e($teacher->name); ?>"/>
        </div>
        <div class="form-group">
            <label>Adress</label>
            <input type="text"  name="adress" placeholder="Enter Adress"  value="<?php echo e($teacher->adress); ?>"/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email"  name="email" placeholder="Enter Email Adress" value="<?php echo e($teacher->email); ?>"/>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text"  name="phone" placeholder="Enter Phone no" value="<?php echo e($teacher->phone); ?>"/>
        </div>
        <div class="form-group">
            <label>Faculty</label>
            <select name="faculty_id" id="faculty_id" required>
                <?php $__currentLoopData = \Models\Faculty::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" 
                        <?php if($item->id==$teacher->id): ?>
                            selected
                        <?php endif; ?>
                        ><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
                <label>Education</label>
                <input type="text"  name="education" placeholder="Enter Education level of teacher" value="<?php echo e($teacher->education); ?>"/>
            </div>
        <div class="form-group">
            <label>Description</label>
        <textarea data-role="textarea" name="description"><?php echo e($teacher->description); ?></textarea>
        </div>
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p >Photo</p>
        <img src="\<?php echo e($teacher->photo); ?>" style="height: 200px;" id="photo"/>
            <input type="file" name="photo" data-role="file" onchange="readURL(this);" data-button-title="..." >
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button"  class="button" value="Cancel" onclick="window.location.href='/admin/teacher/list/'">
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