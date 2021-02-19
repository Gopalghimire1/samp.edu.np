@extends('back.app')
@section('title',"MOCKTEST")
@section('content')
<div>
<h3>For Student Mock Test</h3>
</div>
<hr>
<div class="cell-md-8">
    <form method="post">
        <div class="form-group">
            <label for="time">Exam Time</label>
            <input  data-role="timepicker" name="duration">
        </div>
        <div class="form-group">
            <label for="noofq">No. Of Question</label>
            <input type="number" placeholder="Enter the no. of question" name="noofquestion">
        </div>
        <div class="form-group">
        <button class="button success">Upload</button>
        </div>
    </form>
</div>

@endsection