@extends('back.app')
@section('title',"NEWS")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/news/add/">News Add</a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Photo</th>
        <th data-sortable="true" >Date</th>
        <th data-sortable="true" >publisher</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($newss as $news)
        <tr>
        <td>{{$news->id}}</td>
        <td>{{$news->title}}</td>
        <td><img src="/{{$news->photo}}" alt="" style="height:100px; width:200px;"></td>
        <td>{{$news->published}}</td>
        <td>{{$news->publisher}}</td>
        <td><a href="/admin/news/edit/{{$news->id}}/">Edit</a></td>
        <td><a href="/admin/news/del/{{$news->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop