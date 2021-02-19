@extends('back.app')
@section('title',"ADD CLASSROOM")
@section('content')
<h4>Add Classroom</h4>
<hr/>
    <form method="post" >
            <div class="form-group">
                    <label>Level</label>
                    <select data-role='select' name='level_id'>
                        @foreach ($levels as $level)
                            <option value="{{$level->id}}">
                                {{$level->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
        <div class="form-group">
            <label>Section</label>
            <input type="text"  name="section" placeholder="Enter Level Name"/>
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/classroom/list/'">
        </div>
    </form>
@stop

