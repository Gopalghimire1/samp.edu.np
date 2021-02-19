@extends('back.app')
@section('title','ADD EVENT')
@section('content')

    <h4>Add Event</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" placeholder="Enter Title"/>
        </div>
        <div class="form-group">
            <label>Adress</label>
            <input type="text"  name="adress" placeholder="Enter Adress"/>
        </div>
        <div class="form-group">
            <label>Time</label>
            <input data-role="timepicker" data-seconds="false" name="eventtime">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input data-role="datepicker"  name="eventdate" >
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="description"></textarea>
        </div>
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>Photo</p>
            <img src="" style="height: 200px;" id="photo"/>
            <input type="file" name="photo" data-role="file" onchange="readURL(this);" data-button-title="..." >
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/event/list/'">
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


@stop