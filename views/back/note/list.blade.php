@extends('back.app')
@section('title',"NOTES")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/note/add/">Note Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Level/Class</th>
        <th data-sortable="true" >File</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($notes as $note)
        <tr>
        <td>{{$note->id}}</td>
        <td>{{$note->title}}</td>
        <td>{{$note->level()->name}}</td>
        <td>{{$note->filename}}</td>
        <td><a href="/admin/note/edit/{{$note->id}}/">Edit</a></td>
        <td><a href="/admin/note/del/{{$note->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop