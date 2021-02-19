@extends('back.app')
@section('title',"EXAMS")
@section('content')

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="desc">#id</th>
        <th data-sortable="true" >Name</th>
        <th data-sortable data-format="date">Start Date</th>
        <th data-sortable data-format="date">End Date</th>

        <th></th><th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($exams as $exam)
        <tr>
        <td>{{$exam->id}}</td>
        <td>{{$exam->name}}</td>
        <td>{{$exam->startdate}}</td>
        <td>{{$exam->enddate}}</td>

        <td><a href="/admin/exam/edit/{{$exam->id}}/">Edit</a></td>
        <td><a href="/admin/exam/del/{{$exam->id}}/">Delete</a></td>
        <td><a href="/admin/exam/manage/{{$exam->id}}/">Manage</a></td>

        </tr>
        @endforeach
        </tbody>
</table>


<div style="border: 2px grey solid;padding: 10px;" >
    <h4>Add Exam</h4>
    <hr>
        <form method="post" action="/admin/exam/add/">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text"  name="name" placeholder="Enter name"/>
                </div>
                <div class="row" style="margin-bottom:10px; ">
                <div class=" cell-6 ">
                        <label>Start Date</label>
                        <input data-role="datepicker" name="startdate" placeholder="Enter name"/>
                </div>
                <div class="cell-6 ">
                            <label>End Date</label>
                            <input data-role="datepicker"  name="enddate" placeholder="Enter name"/>
                </div>
                </div>
                <div class="form-group">
                    <button class="button success">Save</button>
                </div>
            </form>
</div>
@stop