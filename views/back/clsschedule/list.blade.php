@extends('back.app')
@section('title',"CLASSCHEDULE")
@section('content')

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Subject</th>
        <th data-sortable="true" >Class Room</th>
        <th></th><th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($clss as $cls)
        <tr>
        <td>{{$cls->id}}</td>
        <td>{{$cls->subname}}</td>
        <td>{{$cls->Classroom()->section}}</td>   
        <td><a href="/admin/clsschedule/edit/{{$cls->id}}/">Edit</a></td>
        <td><a href="/admin/clsschedule/Manage/{{$cls->id}}/">Manage</a></td>
        <td><a href="/admin/clsschedule/del/{{$cls->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop