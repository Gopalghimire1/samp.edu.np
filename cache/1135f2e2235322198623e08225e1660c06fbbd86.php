<?php $__env->startSection('title',"note"); ?>
<?php $__env->startSection('content'); ?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Notes</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Notes</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="container" >
   
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
                <div class="col-md-3">
                    <?php echo $__env->make('studentpanel.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="col-md-8">
                <section id="team" >           
                        <div class="section-content">

                        <div class="pull-right" style="margin:10px;">
                          <input type="text" class="form-control" placeholder="Search" oninput="search(this)">
                        </div>

                        <div>
                           <table class="table table-bordered">
                             <tr class="bg-success">
                                <th>Title</th>
                                <th>Details</th>
                                <th>Class/Level</th>
                                <th>File Name <i class="fa fa-download text-theme-colored2 font-20"></i></th>
                             </tr>
                             <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="note" data-name="<?php echo e($note->Level()->name); ?>" data-title="<?php echo e($note->title); ?>">
                                    <td><?php echo e($note->title); ?></td>
                                    <td><?php echo e($note->description); ?></td>
                                    <td><?php echo e($note->Level()->name); ?></td>
                                    <td><a href="/asset/notes/<?php echo e($note->filename); ?>" class="text-underline"><i class="fa fa-file-pdf-o text-theme-colored2 font-15 mr-5"></i><?php echo e(substr($note->filename,0,20)); ?> </a></td>
                                </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </table>
                        </div>
                        </div>
                    
                    </section>
                </div>
           
        </div>
    </div>

    <?php echo $__env->make('studentpanel.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('studentpanel.changepass', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
  function search(ele){
   
    var txt = ele.value;
    var options = document.querySelectorAll(".note");
    
    for (let index = 0; index < options.length; index++) {
      const element = options[index];
      console.log(element.dataset);
      if(element.dataset.title.toLowerCase().includes(txt.toLowerCase())){
        element.style.display = "table-row";
        continue;
      }else{
        element.style.display = "none";
      }
        if(element.dataset.name.toLowerCase().includes(txt.toLowerCase())){
          element.style.display = "table-row";
          
        }else{
        element.style.display = "none";
      }
    }
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>