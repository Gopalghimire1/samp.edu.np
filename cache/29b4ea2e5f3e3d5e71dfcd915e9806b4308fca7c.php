<?php $__env->startSection('title',"RESULT MANAGE"); ?>
<?php $__env->startSection('content'); ?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Result Manage </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Result</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>



    <div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
                <div class="col-md-3">
                    <?php echo $__env->make('teacherpanel.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="col-md-6" >
                  <label for="">Choose Exam Type :</label>
                  <select name="" id="exam" onchange="loadExamClass(this);" class="form-control">
                  <option value="">------select exam type------</option>
                  <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($exam->id); ?>" ><?php echo e($exam->name); ?> (<?php echo e($exam->startdate); ?> To <?php echo e($exam->enddate); ?>)</option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="col-md-3">
                <label for="">Level/Class :</label>
                    <select name="" id="level" onchange="loadExamSub(this);" class="form-control">
                  <option value="">------select level------</option>                    
                    </select>
                </div>

                <div class="col-md-3">
                <label for="">Subject :</label>
                    <select name="" id="subject"  class="form-control">
                  <option value="">------select subject------</option>                    
                    </select>
                </div>

                <div class="col-md-3" style="margin-top:2rem;">
                  <button class="btn btn-primary" onclick="loadStudents(this);">Manage Marks</button>
                </div>
        </div>

    </div>





    <?php echo $__env->make('teacherpanel.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('teacherpanel.changepass', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script>
 function loadExamClass(ele){
    var id = ele.value;
    if(id!=""){
      
        axios.get('/api/exam/'+id+'/examclasses/')
        .then(function(response){
            if(response.data.success){
                // console.log(response);
                examclasses=response.data.data.examclasses;
                html="<option value=''>------select level------</option>";
                for (let index = 0; index < examclasses.length; index++) {
                    const examclass = examclasses[index];
                    html+="<option value='"+examclass.id+"'>"+examclass.level+"</option>";
                }
                // console.log(html);
                document.getElementById('level').innerHTML=html;
                    
            }else{

            }
        }).catch(function(error){
            console.log(error);
        });
    }
 }
 
 function loadExamSub(ele){
    //  console.log("start");
     var id = ele.value;
    //  console.log(id);
     axios.get('/api/exam/examclass/'+id+'/examsubjects/')
     .then(function(response){
         console.log(response);
         if(response.data.success){
            examsubjects = response.data.data.examsubjects;
            html="<option value=''>------select subject------</option>";
            for (let index = 0; index < examsubjects.length; index++) {
                const element = examsubjects[index];
                html+="<option value='"+element.id+"'>"+element.name+"</option>";
            }
            document.getElementById('subject').innerHTML=html;
         }else{

         }
     
     }).catch(function(error){
            console.log(error);
    });
 }

 function loadStudents(ele){ 
  var exam_id = document.getElementById('exam').value;
  var level_id = document.getElementById('level').value;
  var examclass_id=document.getElementById('subject').value;
   if(exam_id==""){
    toastem.error("Please Select a exam type");
   }else if(level_id==""){
    toastem.error("Please Select a level");
   }else if(examclass_id==""){
     toastem.error("Please Select a Subject");
   }
   else{
      window.open("/teacherpanel/result/examsubject/"+examclass_id+"/marks/");
   }
   
 }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>