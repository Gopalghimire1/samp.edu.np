@extends('back.app')
@section('title',"ADD ACADEMIC")
@section('content')
<h4>Add Academic Calendar Event</h4>
<hr/>

<form method="POST">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter name"/>
    </div>
   <div class="row">
       <div class="cell-md-3 cell-lg-2">
           <div class="float-left-md" style="padding-top:1.5rem;">
               <br/>
               <input type="checkbox" onchange="
               if(this.checked){
                   document.getElementById('multiday').value=1;
                   document.getElementById('enddate').style.display='block';
               }else{
                   document.getElementById('multiday').value=0;
                   document.getElementById('enddate').style.display='none';
                   
               }
               " data-role="switch" checked>
               <label>Multidays</label>
               <input type="hidden" name="multiday" id="multiday" value="1"/>
           </div>
       </div>
       <div class="form-group cell-md-4 cell-lg-3" style="padding-top:1rem;">
           <label>Start Date</label>
           <input data-role="datepicker"  name="start" >
       </div>
       <div class="form-group cell-md-4 cell-lg-3" id="enddate"> 
           <label>End Date</label>
           <input data-role="datepicker" name="end" >
       </div>
   </div>

    <div class="form-group" style="padding-top:1rem;">
        <input type="checkbox" onchange="
        if(this.checked){
            document.getElementById('holiday').value=1;
        } else{
            document.getElementById('holiday').value=0;
        }
        " data-role="switch"  checked >
        <input type="hidden" name="isholiday" id="holiday" value="1"/>
            <label>Holiday</label> 
    </div>
    
    <div class="form-group">
        <button class="button success">Save</button>
        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/academic/list/'">
    </div>
</form>


@stop