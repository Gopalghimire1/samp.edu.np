@extends('back.app')
@section('title','ADD NOTE')
@section('content')

    <h4>Add Note</h4>
    <hr/>
    <form method="post" enctype="multipart/form-data" >
        
        <div class="form-group">
            <label>Title</label>
            <input type="text"  name="title" placeholder="Enter Subject Name"/>
        </div>
        
        <div class="form-group">
                <label>Level/Class</label>
                    <select style="width:200px;" data-role='select' name='level_id' id="level_id">
                        @foreach ($levels as $level)
                            <option value="{{$level->id}}">
                                {{$level->name}}
                            </option>
                        @endforeach
                    </select>
        </div>

        <div class="form-group">
            <label>File Upload</label>
            <input type="file" name="file" data-role="file"  required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea data-role="textarea" name="description"></textarea>
        </div>
        
        <div class="form-group">
            <button class="button success">Submit data</button>
            <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/note/list/'">
        </div>
    </form>


@stop