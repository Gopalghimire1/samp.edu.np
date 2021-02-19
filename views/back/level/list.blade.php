@extends('back.app')
@section('title','dashboard')
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/level/add/">Level Add</a>
</div>

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" data-format="number">Level</th>
        <th></th><th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($levels as $level)
        <tr>
        <td>{{$level->id}}</td>
        <td>{{$level->name}}</td>
        <td><a href="/admin/level/edit/{{$level->id}}/">Edit</a></td>
        <td><a href="/admin/level/del/{{$level->id}}/">Delete</a></td>
        <td><a href="/admin/level/manage/{{$level->id}}/">Manage Students</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop