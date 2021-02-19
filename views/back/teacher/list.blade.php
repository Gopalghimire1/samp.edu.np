@extends('back.app')
@section('title',"TEACHERS")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/teacher/add/">Teacher Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Name</th>
        <th data-sortable="true" >Adress</th>
        <th data-sortable="true" >Email</th>
        <th data-sortable="true" >Phone no</th>
        <th data-sortable="true" >Education</th>
        


        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
        <tr>
        <td>{{$teacher->id}}</td>
        <td>{{$teacher->name}}</td>
        <td>{{$teacher->adress}}</td>
        <td>{{$teacher->email}}</td>
        <td>{{$teacher->phone}}</td>
        <td>{{$teacher->education}}</td>
        <td><a href="/admin/teacher/edit/{{$teacher->id}}/">Edit</a></td>
        <td><a href="/admin/teacher/del/{{$teacher->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop