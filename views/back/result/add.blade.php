@extends('back.app')
@section('title','ADD RESULT')
@section('content')

    <h4>Result Published</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" placeholder="Enter Title" required />
        </div>
        <div class="form-group">
            <label>Publisher</label>
            <input  name="publisher" type="text" placeholder="Enter name of publisher" required/>
        </div>
        <div class="form-group">
                <label>Published Date</label>
                <input data-role="datepicker"  name="date" >
        </div>


        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>File Or Image</p>
            <img src="" style="height: 200px;" id="photo"/>
            <input type="file" name="file" data-role="file" onchange="readURL(this);" data-button-title="..." >
        </div>

        
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/result/list/'">
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