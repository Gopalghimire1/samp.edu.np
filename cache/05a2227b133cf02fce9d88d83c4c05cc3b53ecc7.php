<?php $__env->startSection('title','ADD NOTICE'); ?>
<?php $__env->startSection('content'); ?>
<br>
<h4>Open new Admission</h4>
<hr/>
<form method="post" >
    
    <div class="form-group">
        <label>Title</label>
        <input type="text"  name="title" placeholder="Enter Title" required/>
    </div>
    <div class="form-group">
        <label>Academic Year</label>
        <input type="text"  name="ay" placeholder="Enter Academic Year" required/>
    </div>
    <div class="form-group">
        <label>Subjects</label>
        <input type="text"  name="subject" placeholder="Enter Subjects" data-role="taginput" required/>
    </div>
    <div class="form-group">
        <label>Types</label>
        <input type="text" placeholder="Enter Form Types"  name="types" data-role="taginput" required >
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea data-role="textarea" name="message" required></textarea>
    </div>
    <div class="form-group">
        <button class="button success">Submit data</button>
        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/notice/list/'">
    </div>
</form>
<br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>