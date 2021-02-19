@extends('back.app')
@section('title','Result')
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/result/add/">Result Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" >Title</th>
        <th data-sortable="true" >Publisher</th>
        <th data-sortable="true" >date</th>
        <th data-sortable="false" >File</th>
        
        

        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($results as $r)
        <tr>
        <td>{{$r->title}}</td>
        <td>{{$r->publisher}}</td>
        <td>{{$r->date}}</td>
        <td> <a href="/{{ $r->file }}">Download</a></td>

        <td><a href="/admin/result/edit/{{$r->id}}/">Edit</a></td>
        <td><a href="/admin/result/del/{{$r->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop