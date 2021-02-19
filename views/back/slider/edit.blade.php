@extends('back.app')
@section('title','EDIT SLIDER')
@section('content')
<h4>Edit Slider</h4>
<hr>
<form method="post" enctype="multipart/form-data" class="cell-md-8">
    <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" name="caption" placeholder="Header caption" required value="{{$slider->caption}}">
    </div>

    <div class="form-group">
        <label for="caption">Sub Caption</label>
        <textarea name="subcaption" placeholder="Sub Caption" cols="10" rows="3" required>{{$slider->subcaption}}</textarea>
    </div>

    <div class="form-group">
        <label for="caption">Button Name</label>
        <input type="text" name="button" placeholder="Link button name" required value="{{$slider->button}}">
    </div>

     <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>Photo</p>
            <img src="/{{$slider->image}}" style="height: 200px;" id="photo"/>
            <input type="file" name="image" data-role="file" onchange="readURL(this);" data-button-title="..." >
     </div>

     <div class="form-group">
        <label for="caption">Custom Link</label>
        <input type="text" name="link" placeholder="Your desire link" value="{{$slider->link}}">
    </div>

       <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/slider/list/'">
        </div>

</form>


<script>
        function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
 
             reader.onload = function (e) {
                 $('#photo')
                     .attr('src', e.target.result);
             };
 
             reader.readAsDataURL(input.files[0]);
         }
     }
     </script>
@endsection