@extends('back.app')
@section('title',"ADD CLASSSCHEDULE")
@section('content')
<h4>Add Class Schedule</h4>
<hr/>

<div class="cell-md-8">
    <form method="post">
            <div class="form-group">
                <label>Subject Name</label>
                <input type="text"  name="subname" placeholder="Enter subject title" required/>
            </div>

            <div class="form-group">
                    <label>Class Rooms</label>
                        <select style="width:300px;" data-role='select' name='classroom_id' id="classroom_id">
                            @foreach ($classroom as $class)
                                <option value="{{$class->id}}">
                                   {{$class->Level()->name}} - {{$class->section}}
                                </option>
                            @endforeach
                        </select>
            </div>

            <div class="form-group">
                    <label>Teacher Name</label>
                        <select style="width:300px;" data-role='select' name='teacher_id' id="teacher_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}">
                                   {{$teacher->name}}
                                </option>
                            @endforeach
                        </select>
            </div>

            <div class="form-group">
                <label>Start Time</label>
                <input data-role="timepicker"  name="starttime" />
            </div>

            <div class="form-group">
                <label>Start Time</label>
                <input data-role="timepicker"  name="endtime" />
            </div>

            <div class="form-group">
                <label>Week Day</label>
                <input type="text" name="dayofweek" placeholder="Enter day out of week" required/>
            </div>

            <div class="form-group">
                <button class="button success">Submit data</button>
                <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/clsschedule/list/'">
            </div>


    </form>
</div>
@endsection