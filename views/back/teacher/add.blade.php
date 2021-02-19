@extends('back.app')
@section('title','ADD TEACHER')
@section('content')

    <h4>Add Teacher</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label>Name</label>
            <input type="text"  name="name" placeholder="Enter Name" required/>
        </div>
        {{-- <div class="form-group">
            <label>Adress</label>
            <input type="text"  name="adress" placeholder="Enter Adress"/>
        </div> --}}
        {{-- <div class="form-group">
            <label>Email</label>
            <input type="email"  name="email" placeholder="Enter Email Adress"/>
        </div> --}}
        <div class="form-group">
            <label>Phone</label>
            <input type="text"  name="phone" placeholder="Enter Phone no" required/>
        </div>
        <div class="form-group">
            <label>Faculty</label>
            <select name="faculty_id" id="faculty_id" required>
                @foreach (\Models\Faculty::all() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label>Education</label>
                <input type="text"  name="education" placeholder="Enter Education level of teacher" required/>
        </div>
        {{-- <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="description"></textarea>
        </div> --}}
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p >Photo</p>
            <img src="" style="height: 200px;" id="photo"/>
            <input type="file" name="photo" data-role="file" onchange="readURL(this);" data-button-title="..." >
        </div>


        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button"  class="button" value="Cancel" onclick="window.location.href='/admin/teacher/list/'">
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