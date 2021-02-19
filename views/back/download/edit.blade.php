@extends('back.app')
@section('title','EDIT DOWNLOAD ITEMS')
@section('content')

    <h4>EDIT DOWNLOAD ITEMS</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" value="{{ $download->title }}" required/>
        </div>
       
        <div class="form-group">
            <label>Date</label>
            <input data-role="datepicker" value="{{ $download->date }}"  name="date" required />
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="desc"> {{ $download->detail }}"</textarea>
        </div>
        <div class="form-group container" style="border: 1px black solid; padding-bottom:5px;" >
            <p>Files</p>
            <input type="file" name="file" data-role="file" data-button-title="..." >
            <p>{{ $download->file }}"</p>
        </div>
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/download/list/'">
        </div>
    </form>

    


@stop