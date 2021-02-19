@extends('back.app')
@section('title',"NOTICE")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/notice/add/">Notice Add</a>
</div>

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="false">image</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Date</th>
        <th data-sortable="true" >publisher</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($notices as $notice)
        <tr>
        <td>{{$notice->id}}</td>
        <td>
            <img src="/assets/img/page/{{ $notice->image }}" alt="" srcset="" style="max-width:200px;" ></td>
        </td>
        <td>
            {{$notice->title}}
        </td>
        <td>{{$notice->published}}</td>
        <td>{{$notice->publisher}}</td>
        <td><a href="/admin/notice/edit/{{$notice->id}}/">Edit</a></td>
        <td><a href="/admin/notice/del/{{$notice->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop