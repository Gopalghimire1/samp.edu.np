@extends('back.app')
@section('title',"Popup")
@section('content')

    <h4>Popup</h4>
    <hr />
    <form method="post" action="/admin/popup/save/" enctype="multipart/form-data">
       <?php
            $popup=\Models\Popup::first();
            $page='';
            $image='';
            $status=0;
            if($popup!=null){
                $page=$popup->body;
                $image=$popup->image;
                $status=$popup->status;
            }
       ?>
       <div class="form-group">
           <input type="checkbox" data-role="checkbox" {{$status==1?'checked':""}}  data-caption="Enabled" name="status" value="1"> 
       </div>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="body" id="body" >{{$page}}</textarea>
        </div>
           <div>
            <label >Feature Image</label>
            <div class="row">
                <div class="cell-3"></div>
                <div class="cell-6">
                    <div class="row" id="images">
                
                    
                        <div style="position: relative">
                            <div >
                                <input  onchange="loadImage(this)"style="display:none;" name="image" type="file" id="gal" accept="image/*"/>
                                <img src="{{$image!=""?"/assets/img/page/".$image:"/assets/img/newimage_large.png"}}" alt="..." id="gal_img" 
                                onclick="document.getElementById('gal').click();" style="width:100%;">
                            </div>
                            <div style="position: absolute;top:0px;right:0px;">
                                <span class="button alert"
                                onclick="
                                document.getElementById('gal').value = null;
                                document.getElementById('gal_img').src='{{$image!=""?"/assets/img/page/".$image:"/assets/img/newimage_large.png"}}';
                                "
                                >Clear</span>
                            </div>
                        </div>
                  
            </div>
                </div>
                <div class="cell-3"></div>
            </div>
            
            
        </div>
      <br>
        <div class="form-group">
            <button class="button success">Save Popup</button>
           
        </div>
    </form>
    <br>
@endsection
@section('script')
   
    <script>
        

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
                    document.getElementById('gal_img').src='{{$image!=""?"/assets/img/page/".$image:"/assets/img/newimage_large.png"}}';
                    input.value=null;
                    console.log(input.files);
                }else{

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        }

    </script>
@endsection
