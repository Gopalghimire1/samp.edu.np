@extends('back.app')
@section('title',"EDIT EXAM")
@section('content')

    <h4>Edit Exam</h4>
    <hr>
        <form method="post" >
                <div class="form-group">
                    <label>Name</label>
                <input type="text"  name="name" placeholder="Enter name" value="{{$exam->name}}"/>
                </div>
                <div class="row" style="margin-bottom:10px; ">
                <div class=" cell-6 ">
                        <label>Start Date</label>
                        <input data-role="datepicker" name="startdate" placeholder="Enter name" data-value="{{$exam->startdate}}"/>
                </div>
                <div class="cell-6 ">
                            <label>End Date</label>
                            <input data-role="datepicker"  name="enddate" placeholder="Enter name" data-value="{{$exam->enddate}}"/>
                </div>
                </div>
                <div class="form-group">
                    <button class="button success">Save</button>
                </div>
            </form>

@stop