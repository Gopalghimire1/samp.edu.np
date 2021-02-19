@extends('back.app')
@section('title','EDIT LEVEL')
@section('content')

    <h4>Edit Level</h4>
    <hr/>
    <form method="post" >
        <div class="form-group">
            <label>Name</label>
        <input type="text"  name="name" placeholder="Enter Level Name" value="{{$level->name}}"/>
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/level/list/'">
        </div>
    </form>


@stop