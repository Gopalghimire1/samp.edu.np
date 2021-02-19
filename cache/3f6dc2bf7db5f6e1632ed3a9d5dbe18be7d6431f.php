<?php $__currentLoopData = Models\Studentinbox::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert 
    <?php if($note->type==0): ?>
    alert-danger
    <?php elseif($note->type==1): ?>
    alert-success
    <?php else: ?>
    alert-info
    <?php endif; ?>
    alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <?php echo e($note->message); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>