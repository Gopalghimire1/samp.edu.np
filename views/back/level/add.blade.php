@extends('back.app')
@section('title','ADD LEVEL')
@section('content')

    <h4>Add Level</h4>
    <hr/>
    <form method="post" >
        
        <div class="form-group">
            <label>Level/Class</label>
            <input type="text"  name="name" placeholder="Enter Level/Class"/>
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/level/list/'">
        </div>
    </form>


@stop