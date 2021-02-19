@extends('back.app')
@section('title',"STUDENTS")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/student/add/">Student Add</a>
</div>

<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Name</th>
        <th data-sortable="true" >Adress</th>
        <th data-sortable="true" >email</th>
        <th data-sortable="true" >phone</th>
        <th data-sortable="true" >Level/Class</th>
        <th data-sortable="true" >Classroom</th>    
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->adress}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->level()->name}}</td>
        <td>{{$student->classroom()->level()->name}}
            @if($student->classroom()->section!=null)
                    - {{$student->classroom()->section}}
            @endif
        </td>        
        <td><a href="/admin/student/edit/{{$student->id}}/">Edit</a></td>
        <td><a href="/admin/student/del/{{$student->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@stop