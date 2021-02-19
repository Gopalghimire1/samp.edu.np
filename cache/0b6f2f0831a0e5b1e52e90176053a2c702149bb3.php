
<?php $__env->startSection('title'," About Us"); ?>
<?php $__env->startSection('content'); ?>

    <h4>About Us</h4>
    <hr />
    <form method="post" action="/admin/aboutus/save/" enctype="multipart/form-data">
       <?php
            $aboutus=\Models\Aboutus::first();
            $page='';
            if($aboutus!=null){
                $page=$aboutus->page;
            }
       ?>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="page" id="body" ><?php echo e($page); ?></textarea>
        </div>
        <br>
      
        <div class="form-group">
            <button class="button success">save aboutus</button>
           
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="/tinymce/tinymce.min.js"> </script>
    <script>
        tinymce.init({
            selector: "textarea",
            relative_urls: false,
            theme: "modern",
           
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true,

            external_filemanager_path: "/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {
                "filemanager": "/filemanager/plugin.min.js"
            }
        });

        function loadImage(input){
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#gal_img').attr('src', e.target.result);
                }
                var FileSize = input.files[0].size  / 1024; 
                if(FileSize>1024){
                    alert('Image Size Cannot Be Greater than 1mb');
                    document.getElementById('gal_img').src='/assets/img/newimage_large.png';
                    input.value=null;
                    console.log(input.files);
                }else{

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>