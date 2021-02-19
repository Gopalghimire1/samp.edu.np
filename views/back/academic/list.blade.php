@extends('back.app')
@section('title',"ACADEMICS")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/academic/add/">Academic Add</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Title</th>
        <th data-sortable="true" >Start Date</th>
        <th data-sortable="true" >End Date</th>
        <th data-sortable="true" >Total Days</th>  
        <th data-sortable="true" >Holiday</th>  

        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($academics as $academic)
        <tr>
        <td>{{$academic->id}}</td>
        <td>{{$academic->name}}</td>
        <td>{{$academic->start}}</td>
        <td>
            @if($academic->multiday==1)
               {{$academic->end}}
            @else
                -------------
            @endif
            </td>
        <td>{{$academic->totalDays()}}</td>
        <td>
            @if($academic->isholiday==1)
                Yes
            @else
                No
            @endif
        </td>
        <td><a href="/admin/academic/edit/{{$academic->id}}/">Edit</a></td>
        <td><a href="/admin/academic/del/{{$academic->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop