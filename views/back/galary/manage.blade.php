@extends('back.app')
@section('title','Manage Galary')
@section('content')
<script>
    var selectedimages=[];
</script>
<div>
<h4>{{$galary->title}}</h4>
<hr>
</div>
<div>
<div>
    <button class="button bg-red fg-white" style="margin:2px;" onclick="delImages();"><span class="mif-bin "></span> Delete</button>
</div>
 @foreach($images as $image)
<img src="/{{$image->filepath}}" id='image{{$image->id}}' data-id="{{$image->id}}" data-status="0" style="height: 200px;width:200px;margin:2px;" onclick="manageselection(this);">      
 @endforeach
</div>
<br/>
 <div style="display: block;border:1px solid black;padding:5px;">
     <h4>Add Photos</h4>
     <hr/>
     <div id="viwer" style="padding:5px;">

     </div>
     <hr/>
     <form method="POST" action="/admin/galary/addphotos/{{$galary->id}}/" enctype="multipart/form-data">
            <div class="form-group">
                <label>Select Photos</label>
                <input type="file" data-role="file" onchange="readURL(this);" name="files[]" id="files" data-button-title="Choose Photos" multiple="multiple"/>
            </div>
            <div class="form-group">
                    <div class="form-group">
                    <button class="button success">Submit data</button>
                    <input type="reset" class="button" value="Cancel"
                     onclick="
                     document.getElementById('files').value='';
                     document.getElementById('viwer').innerHTML='';
                     ">
            </div>
     </form>
     
    
 </div>

 <script>
     function manageselection(image){
         if(image.dataset.status==0){
             image.style.border="2px solid blue";
             image.dataset.status=1;
             selectedimages.push(image.dataset.id);
         }else{
            image.style.border="none";
             image.dataset.status=0;
             remove(selectedimages,image.dataset.id)
         }
     }

     function remove(array, element) {
        var index = array.indexOf(element);
        if (index !== -1) {
            array.splice(index, 1);
        }

    }

    function delImages(){
        if(selectedimages.length<1){
            var toast = Metro.toast.create;
            toast("Please select at least one image to delete");
            return;
        }
        // const axios = require('axios');
        axios.post('/admin/galary/delPhoto/{{$galary->id}}/', {
            images:selectedimages.toString(),
        })
        .then(function (response) {
            console.log(response);
            var data=response.data;
            console.log(data.success);
            console.log(data.data);
            if(data.success){
                var length=data.data.length;
                var deletedimages=data.data;
                for (let index = 0; index < length; index++) {
                    var id = deletedimages[index];
                    remove(selectedimages,id);
                    console.log('image'+id);
                    document.getElementById('image'+id).remove();
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    function readURL(input) {
             if (input.files ) {
                current="";
                for (let index = 0; index <  input.files.length; index++) {
                    var file = input.files[index];
                    if(file){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                        current+="<img  src='"+e.target.result +"' height='200' width='200' style='margin:8px;' />";
                        document.getElementById("viwer").innerHTML=current;
                        };
                        reader.readAsDataURL(file);
                    }
                }
             }
         }
 
 </script>
@stop