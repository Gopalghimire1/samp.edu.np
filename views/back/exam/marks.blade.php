@extends('back.app')
@section('title',"MANAGE MARKS")
@section('content')
<form method="post">
    <table class="table" data-show-table-info="false" data-rows="-1" data-role="table" data-show-rows-steps="false" data-show-search="false">
    <thead>
        <tr>
            <th data-sortable="true">Roll No</th>
            <th data-sortable="true">Student Name</th>
            <th>Marks</th>
        </tr>
    </thead>
        @foreach($marks->students as $student)
        <tr>
            <td>
                {{$student->roll}}
            </td>
            <td>
                {{$student->name}}
            </td>
            <td>
            <input name="mark-{{$student->id}}" value="{{$marks->get($student->id)->mark}}" />
            </td>
        </tr>
        @endforeach
    </table>
    
    <hr>
    <div class="form-group">
        <button class="button success">Submit data</button>
        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/exam/manage/{{$marks->examsubject->examclass()->exam_id}}/'">
    </div>
    
</form>
@stop