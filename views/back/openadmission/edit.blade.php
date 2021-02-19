@extends('back.app')
@section('title','Edit Admission NOTICE')
@section('content')
<br>
<h4>Edit Admission</h4>
<hr/>
<form method="post" >
    <div class="form-group">
        <label>Title</label>
        <input type="text"  name="title" placeholder="Enter Title" required value="{{$opad->title}}"/>
    </div>
    <div class="form-group">
        <label>Academic year</label>
        <input type="text"  name="ay" placeholder="Enter Academic Year" required maxlength="4" value="{{$opad->ay}}"/>
    </div>
    <div class="form-group">
        <label>Subjects</label>
        <input type="text"  name="subject" placeholder="Enter Subjects" data-role="taginput" required  value="{{$opad->subject}}"/>
    </div>
    <div class="form-group">
        <label>Types</label>
        <input type="text" placeholder="Enter Form Types"  name="types" data-role="taginput" required  value="{{$opad->types}}">
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea data-role="textarea" name="message" required>{{$opad->message}}</textarea>
    </div>
    <div class="form-group">
        <button class="button success">Submit data</button>
        <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/notice/list/'">
    </div>
</form>
@endsection