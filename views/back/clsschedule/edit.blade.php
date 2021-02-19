@extends('back.app')
@section('title',"EDIT CLASSSCHEDULE")
@section('content')
<h4>Edit Class Schedule</h4>
<hr/>

<div class="cell-md-8">
    <form method="post">
            <div class="form-group">
                <label>Subject Name</label>
                <input type="text"  name="subname" placeholder="Enter subject title" value="{{$clss->subname}}" />
            </div>

            <div class="form-group">
                    <label>Class Rooms</label>
                        <select style="width:300px;" data-role='select' name='classroom_id' id="classroom_id">
                            @foreach ($classroom as $class)
                                <option value="{{$class->id}}"
                                @if($clss->classroom_id==$class->id)
                                 selected="selected"
                                @endif
                                >
                                   {{$class->Level()->name}} - {{$class->section}}
                                </option>
                            @endforeach
                        </select>
            </div>

            <div class="form-group">
                    <label>Teacher Name</label>
                        <select style="width:300px;" data-role='select' name='teacher_id' id="teacher_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}"
                                @if($clss->teacher_id==$teacher->id)
                                selected="selected"
                                @endif
                                >
                                   {{$teacher->name}}
                                </option>
                            @endforeach
                        </select>
            </div>

            <div class="form-group">
                <label>Start Time</label>
                <input data-role="timepicker"  name="starttime" value="{{$clss->starttime}}"/>
            </div>

            <div class="form-group">
                <label>Start Time</label>
                <input data-role="timepicker"  name="endtime" value="{{$clss->endtime}}" />
            </div>

            <div class="form-group">
                <label>Week Day</label>
                <input type="text" name="dayofweek" placeholder="Enter day out of week" value="{{$clss->dayofweek}}"/>
            </div>

            <div class="form-group">
                <button class="button success">Submit data</button>
                <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/clsschedule/list/'">
            </div>


    </form>
</div>
@endsection