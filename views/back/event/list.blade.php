@extends('back.app')
@section('title',"EVENTS")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/event/add/">Event Add</a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Photo</th>
        <th data-sortable="true" >Date</th>
        <th data-sortable="true" >Time</th>
        <th data-sortable="true" >Adress</th>    
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
        <td>{{$event->id}}</td>
        <td>{{$event->title}}</td>
        <td><img src="/{{$event->photo}}" alt="" style="height:100px; width:200px;"></td>
        <td>{{$event->eventdate}}</td>
        <td>{{$event->eventtime}}</td>
        <td>{{$event->adress}}</td>
        <td><a href="/admin/event/edit/{{$event->id}}/">Edit</a></td>
        <td><a href="/admin/event/del/{{$event->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop