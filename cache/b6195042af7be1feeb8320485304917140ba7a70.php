
<?php $__env->startSection('title', 'Addmission Request'); ?>
<?php $__env->startSection('content'); ?>
<style>
    @media  print{
   .noprint{
       display:none;
   }
   .cell-full{
       
   flex: 0 0 100% !important;
    max-width: 100% !important;
   }
}
</style>
    <h4>Admission Detail / <?php echo e($ad->id); ?> / <?php echo e($student->name); ?></h4>
    <hr />
    <div>
        <h5>Personal Infomation</h5>
        <hr>
        <div class="row">
            <div class="cell-6">
                <strong>Name : </strong>
                <?php echo e($student->name); ?>

            </div>
            <div class="cell-6">

                <?php echo e($student->name_dev); ?>

            </div>
            <div class="cell-6">
                <strong>Father Name : </strong>
                <?php echo e($student->fathername); ?>

            </div>
            <div class="cell-6">
                <strong>Mother Name : </strong>
                <?php echo e($student->mothername); ?>

            </div>
            <div class="cell-6">
                <strong>Province : </strong>
                <?php echo e($student->province); ?>

            </div>
            <div class="cell-6">
                <strong>District : </strong>
                <?php echo e($student->district); ?>

            </div>
            <div class="cell-12">
                <strong>Municipality : </strong>
                <?php echo e($student->mun); ?>, ward no <?php echo e($student->wardno); ?>

            </div>
            <div class="cell-6">
                <strong>Contactno : </strong><?php echo e($student->phone); ?>

            </div>
            <div class="cell-6">
                <strong>Email : </strong><?php echo e($student->email); ?>

            </div>
            <div class="cell-4">
                <strong>Gender : </strong><?php echo e($student->gender); ?>


            </div>
            <div class="cell-4">
                <strong>Religion : </strong><?php echo e($student->religion); ?>


            </div>
            
            <div class="cell-4">
                <strong>Caste : </strong><?php echo e($student->caste); ?>

            </div>
            <div class="cell-8">
                <strong>Date of Birth : </strong><?php echo e($student->dob_bs); ?> ( <?php echo e($student->dob_ad); ?>)
            </div>
           
                    <div class="cell-2 noprint">
                        <img class="download" src="/assets/img/student/<?php echo e($student->photo); ?>" style="width:100%;" download="<?php echo e($student->name); ?>_pp_<?php echo e($student->id); ?>"/>
                    </div>
                
        </div>
    </div>
    <hr>
    <div>
        <div class="row">
            <div class="cell-6 cell-full">
                <h5>
                    Admission Detail
                </h5>
                <hr>
                
                <div>
                    <div style="max-width: 100%;overflow-x:scroll;">

                        <table class="table">
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    subject
                                </th>
                                <th>Type</th>


                                <th>Status</th>
                               
                            </tr>
                          
                                <tr>
                                    <td>
                                        <?php echo e($ad->title); ?>

                                    </td>
                                    <td>
                                        <?php echo e($ad->subject); ?>

                                    </td>
                                    <td><?php echo e($ad->type); ?></td>

                                    <td><?php echo e(status[$ad->status]); ?></td>
                                    
                                </tr>
                      
                        </table>
                    </div>
                </div>
            </div>

            <div class="cell-6">
                <h5>Voucher</h5>
                <hr>
                <img class="download noprint" src="/assets/img/student/<?php echo e($ad->voucher); ?>" style="max-width: 100%;" download="<?php echo e($student->name); ?>_voucher_<?php echo e($student->id); ?>">
            </div>
        </div>
    </div>
    <hr>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }



        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid black;
        }

        tr {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

    </style>
    <div>
        <h5>Academic Record</h5>
        <hr>
        <table class="table">
            <tr>
                <th>
                    Title
                </th>
                <th>
                    organization
                </th>
                <th>Passed Year</th>
                <th>symbolno</th>
                <th colspan="4" style="text-align: center;">Academics</th>
            </tr>
            <?php echo $student->academicsRender(); ?>

        </table>
    </div>
    <hr>
    <div >
        <h5 onclick="downloadAll()" class="noprint">Documents</h5>
        <hr>
        <div>
            <?php $__currentLoopData = $student->uploads(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="row" style="margin:2rem 0rem;">
                    <div class="cell-4 noprint">
                        <img class="download" src="/assets/img/student/<?php echo e($item->file); ?>" download="<?php echo e($student->name); ?>_<?php echo e($item->title); ?>_<?php echo e($item->remark); ?>_<?php echo e($student->id); ?>" style="width:100%">
                    </div>
                    <div class="col-md-8">
                        <h4><?php echo e($item->title); ?></h4>
                        <br>
                        <p class="noprint"> <strong>Verified By:</strong><?php echo e($item->verified_by); ?> </p>
                        <p class="noprint"> <strong>Remarks:</strong><?php echo e($item->remark); ?> </p>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    </div>
    <div class="noprint" style="position:fixed;bottom:5px;right:5px;background:white;">
        <?php if($old>0): ?>
        <a class="button secondary" href="/admin/admission/detail/<?php echo e($prev); ?>/">Previous</a>
        <?php endif; ?>
        <form action="/admission/accept/" method="post" style="display:inline-block;">
            <input type="hidden" name="id" value="<?php echo e($ad->id); ?>">
            <button class="button primary">Accept</button>
        </form>   
        <form action="/admission/reject/" method="post" style="display:inline-block;">
            <input type="hidden" name="id" value="<?php echo e($ad->id); ?>">
            <button class="button alert">Reject</button>
        </form>
         <button class="button success" onclick="downloadAll()">Download Images</button>
        <?php if($new>0): ?>
        <a class="button secondary" href="/admin/admission/detail/<?php echo e($next); ?>/">Next</a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function downloadAll(){  
        $('.download').each(function() {
            file=$( this ).attr( "src" );
            attr=$( this ).attr( "download" );
            var theAnchor = $('<a />')  
                .attr('href', file)  
                .attr('download',attr);  
                console.log(theAnchor)
            theAnchor[0].click();  
            theAnchor[0].remove();  
            console.log(file,attr);
        });
        
        
    }  
    
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>