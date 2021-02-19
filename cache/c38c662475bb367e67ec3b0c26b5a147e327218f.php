<?php $__env->startSection('title',"MOCKQUESTION"); ?>
<?php $__env->startSection('content'); ?>
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Mock Question </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Mock</li>
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
                <div class="col-md-8" >


                 <div>
                   <table class="table table-bordered">
                    <tr>
                        <th>Class Room</th>
                        <th>Number Of Question</th>
                        <th>Exam Duration</th>
                        <th></th><th></th>
                    </tr>
                    <?php $__currentLoopData = $mocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($mock->classroom->section); ?></td>
                         <td><?php echo e($mock->noofquestion); ?></td>
                         <td><?php echo e($mock->duration); ?></td>
                         <td><p data-toggle="modal"  data-target="#mocktest" class="btn btn-primary btn-xs" onclick="document.getElementById('mock_id').value=<?php echo e($mock->id); ?>;">Add Question</p></td>
                         <td><a href="/teacherpanel/mockquestion/list/<?php echo e($mock->id); ?>/" class="btn btn-link btn-xs">List Of Question</a></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </table>
                 </div>
                </div>
           
        </div>
    </div>

<!-- model box -->
  <div class="modal fade" id="mocktest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Question Addition</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
         <form method="post" id="addquestion" enctype="multipart/form-data">
                        <input type="hidden" name="mock_id" id="mock_id">
                        <div class="form-group">
                            <label for="question">Question</label>
                             <textarea name="question" id="question"  rows="4" class="form-control" placeholder="Enter Question"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ans">Answer</label>
                            <input type="text" id="options" name="options" class="form-control" placeholder="Enter answer like opt1, opt2, opt3, opt4">
                        </div>
                        <div class="form-group">
                            <label for="ans">Correct Answer</label>
                            <select data-role="select" name="correct" class="form-control">
                                <option value="1">Opt1</option>
                                <option value="2">Opt2</option>
                                <option value="3">Opt3</option>
                                <option value="4">Opt4</option>
                            </select>
                        </div>
                          <div class="modal-footer d-flex justify-content-center">
                              <span onclick="AddMockQuestion();" class="btn btn-primary">upload</span>
                          </div>
                    </form>
      </div>
    </div>
  </div>
</div>



    <?php echo $__env->make('teacherpanel.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('teacherpanel.changepass', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
    function AddMockQuestion(){
      var fdata=new FormData(document.getElementById('addquestion'));
      axios.post('/teacherpanel/mockquestion/add/',fdata)
      .then(function(response){
        console.log(response);
        data=response.data;
        if(data.success){
          toastem.success("Question Added");
          document.getElementById('question').value="";   
          document.getElementById('options').value="";   
           }else{
          toastem.error("Data Cannot Be Loaded");
        }
      })
      .catch(function(error){
        toastem.error("Data Cannot Be Loaded");
      });
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>