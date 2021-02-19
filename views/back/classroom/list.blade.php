@extends('back.app')
@section('title',"CLASSROOMS")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/classroom/add/">Classroom Add</a>
</div>

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Level / class</th>
        <th data-sortable="true" >Section</th>
        

        <th></th><th></th><th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($classrooms as $classroom)
        <tr>
        <td>{{$classroom->id}}</td>
        <td>{{$classroom->level()->name}}</td>
        <td>{{$classroom->section}}</td>

        <td><a href="/admin/classroom/edit/{{$classroom->id}}/">Edit</a></td>
        <td><a href="/admin/classroom/del/{{$classroom->id}}/">Delete</a></td>
        <td><a href="/admin/clsschedule/Manage/{{$classroom->id}}/">Schedule</a></td>
        <td><a href="/admin/mocktest/Manage/{{$classroom->id}}/">Mock Test</a></td>


    
        </tr>
        @endforeach
        </tbody>
    </table>

@stop