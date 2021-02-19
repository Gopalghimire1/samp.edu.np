@extends('back.app')
@section('title','Add student list')
@section('content')

    <h4>ADD Student list</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" placeholder="Enter Title" required/>
        </div>
       
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>Student List Excel File </p>
            <input  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" type="file"  name="file" required data-role="file" data-button-title="छान्नुहोस्" >
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/sdlist/list/'">
        </div>
    </form>

    


@stop