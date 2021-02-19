
<?php $__env->startSection('title',"student list"); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/r-2.2.5/datatables.min.css"/>
 
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">बिधार्थी को सुची </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">मूल पृष्ठ </a></li>
                <li class="active">पृष्ठहरु </li>
                <li class="active"> <a href="/students/"> बिधार्थी को सुची </a></li>
                <li class="active"><?php echo e($title); ?> </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    <div class="row" style="margin-top:3rem; margin-bottom:3rem;" >

      <div  class="col-md-12">
        <h4 class="text-center">बिधार्थी को सुची - <?php echo e($title); ?> </h4>
        <hr>
        <table  id="myTable">
         <?php 
            $i = 0;
            foreach ($xlsx->rows() as $elts) {
            if ($i == 0) {
                echo "<thead><tr>"; 
                    foreach ($elts as $key => $elt) {
                        echo '<th>'.$elt.'</th>';
                    }
                echo "</tr><thead><tbody>";
            } else {
               echo "<tr>"; 
                    foreach ($elts as $key => $elt) {
                        echo '<td>'.$elt.'</td>';
                    }
                echo "</tr>";
            }      

            $i++;
            }

            ?>
            </tbody>
        </table>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/r-2.2.5/datatables.min.js"></script>
    <script>
        $('#myTable').DataTable( {
            responsive: true
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>