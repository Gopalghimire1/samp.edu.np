@extends('back.app')
@section('title','EDIT Notice')
@section('content')

    <h4>Edit Notice</h4>
    <hr/>

    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
        <input type="text"  name="title" placeholder="Enter Title" value="{{$notice->title}}"/>
        </div>
        <div class="form-group">
            <label>Publisher</label>
            <input type="text"  name="publisher" placeholder="Enter Publisher" value="{{$notice->publisher}}" />
        </div>
        <div class="form-group">
            <label>Date</label>
            <input data-role="datepicker"  name="published" value="{{$notice->published}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="description">
                {{$notice->description}}
            </textarea>
        </div>
     

        <div>
            <br>
            <label > 
                <strong>
                    Image
                </strong> 
            </label>
            <div  id="images">
                            <div >
                                <input required onchange="loadImage(this)"style="display:none;" name="image" type="file" id="gal" accept="image/*"/>
                                <img src="{{$notice->image==null?'/assets/img/newimage_large.png':'/assets/img/page/'.$notice->image}}" alt="..." id="gal_img" 
                                onclick="document.getElementById('gal').click();" style="width:100%;">
                            </div>
                            <div style="position: absolute;top:0px;right:0px;">
                                <span class="button alert"
                                onclick="
                                document.getElementById('gal').value = null;
                                document.getElementById('gal_img').src='{{$notice->image==null?'/assets/img/newimage_large.png':'/assets/img/page/'.$notice->image}}';
                                "
                                >Clear</span>
                            </div>
                        </div>
            </div>
        </div>
        <br>

        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/notice/list/'">
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
                    document.getElementById('gal_img').src="{{$notice->image==null?'/assets/img/newimage_large.png':'/assets/img/page/'.$notice->image}}";
                    input.value=null;
                    console.log(input.files);
                }else{

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        }

    </script>
@endsection