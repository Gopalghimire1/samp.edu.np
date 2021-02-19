@extends('back.app')
@section('title',' Edit Member')
@section('content')

    <h4>Edit Member</h4>
    <hr />
    <form method="post" action="/admin/member/edit/{{$data->id}}/" enctype="multipart/form-data">

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="name" placeholder="Enter Name" required value="{{$data->name}}"/>
        </div>
<br>
        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="desig" placeholder="Enter Designation" required value="{{$data->desig}}"/>

     
        </div>
        <br>
        <div>
            <label >Image</label>
            <div class="row" id="images">
                
                    
                        <div style="position: relative">
                            <div >
                                <input required onchange="loadImage(this)"style="display:none;" name="image" type="file" id="gal" accept="image/*"/>
                                <img src="/assets/img/page/{{$data->image}}" alt="..." id="gal_img" 
                                onclick="document.getElementById('gal').click();" style="width:100%;">
                            </div>
                            <div style="position: absolute;top:0px;right:0px;">
                                <span class="button alert"
                                onclick="
                                document.getElementById('gal').value = null;
                                document.getElementById('gal_img').src='/assets/img/page/{{$data->image}}';
                                "
                                >Clear</span>
                            </div>
                        </div>
                  
            </div>
            
        </div>
        <br>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/member/list/'">
        </div>
    </form>
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
                    document.getElementById('gal_img').src='/assets/img/page/{{$data->image}}';
                    input.value=null;
                    console.log(input.files);
                }else{

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        }

    </script>
@endsection
