@extends('back.app')
@section('title', "Faculties")
@section('content')
@php
    $datas=\Models\Faculty::all();
@endphp
<div  style="padding:1rem 0rem">
    <form action="/admin/faculty/add/" method="POST">
        <input type="text" name="name" id="name" required placeholder="Enter Faculty Name">
        
        <input type="submit" style="margin-top: 1rem;" class="button primary" value="Add Faculty">
    </form>
</div>
<hr>
<h1 style="padding: 0px 10px;font-weight:400;">Faculty List</h1>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Name</th>
     <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($datas as $notice)
        <tr>
        <td>{{$notice->id}}</td>
        <td>{{$notice->name}}</td>
   
        <td><a href="/admin/faculty/del/{{$notice->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection