@extends('back.app')
@section('title',"GALARIES")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/galary/add/">Gallery Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >No of Photos</th>
 
        <th></th><th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($galaries as $galary)
        <tr>
        <td>{{$galary->id}}</td>
        <td>{{$galary->title}}</td>
        <td>{{$galary->Photos()}}</td>
        <td><a href="/admin/galary/edit/{{$galary->id}}/">Edit</a></td>
        <td><a href="/admin/galary/del/{{$galary->id}}/">Delete</a></td>
        <td><a href="/admin/galary/manage/{{$galary->id}}/">Manage Images</a></td>

        </tr>
        @endforeach
        </tbody>
    </table>

@stop