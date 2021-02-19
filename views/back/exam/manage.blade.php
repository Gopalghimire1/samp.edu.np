@extends('back.app')
@section('title',"MANAGE EXAM")
@section('content')
<style>
    .v-100{
        height: 100%;
    }
</style>
<h4>
    {{$exam->name}} ({{$exam->startdate}} to {{$exam->enddate}})
</h4>

<hr />
<script>
    function addclasslevel(){
    axios.post('/admin/exam/level/add/{{$exam->id}}/', {
            level_id:document.getElementById('level_id').value,
        })
        .then(function (response) {
               console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}
</script>

<div>
    <form method="post" class="inline-form" action="/admin/exam/level/add/{{$exam->id}}/">
        <label>Level/Class</label><select style="width:200px;" data-role='select' name='level_id' id="level_id">
            @foreach ($levels as $level)
            <option value="{{$level->id}}">
                {{$level->name}}
            </option>
            @endforeach
        </select>
        <input type="submit" class="button success" style="top:-4px;" value="Add" />
    </form>
</div>
<hr>
<div class="row v-100">
    <div class="cell-3 h-100" style="padding:0%;">
        <ul data-role="tabs" data-tabs-position="vertical" style="width:100%;">
            @foreach($exam->examclasses() as $examclass)
            <li><a href="#examclass-{{$examclass->id}}"><b>Level/class - {{$examclass->level()->name}} </b> </a></li>
            @endforeach
        </ul>
    </div>
    <div class="cell-9 v-100" style="padding:0%;">
        <div class="border-top border-left bd-default  v-100" style="padding:12px;">
            @foreach($exam->examclasses() as $examclass)

            <div id="examclass-{{$examclass->id}}" class="v-100">
                <div>
                    <form method="post" class="inline-form" action="/admin/examclass/subject/add/{{$examclass->id}}/">
                     <input type="text" placeholder="Enter subject name" name="name">
                     <input type="text" placeholder="Enter Fullmarks" name="fullmarks">
                     <input type="text" placeholder="Enter PassMarks" name="passmarks">
                    <input type="submit" class="button success" style="top:-1px;" value="Add" />
                    </form>
                </div>
                <br>
                <table class="table"  data-role="table">
                    <thead>

                        <tr style="text-align: left;">
                            <th >Subject Name</th>
                            <th>FullMarks</th>
                            <th>PassMarks</th><th></th><th></th><th></th>
                        </tr>
                    </thead>
                @foreach($examclass->examsubjects() as $examsubject)
                    <tr>
                        <td>{{$examsubject->name}}</td>
                        <td>{{$examsubject->fullmarks}}</td>
                        <td>{{$examsubject->passmarks}}</td>
                    <td><a href="/admin/examsubject/edit/{{$examsubject->id}}/">Edit</a></td>
                    <td><a href="/admin/examsubject/del/{{$examsubject->id}}/">Delete</a></td>
                    <td><a href="/admin/examsubject/marks/{{$examsubject->id}}/">Manage Marks</a></td>
                    </tr>
                @endforeach
            </table>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- subject add --}}
<div class="dialog" data-role="dialog" id="addsub" data-actions-align="right">
    <div class="dialog-title" style="border-bottom: darkgrey 1px solid;">Add Subject</div>
    <div class="dialog-content">
        <label>Subject Name</label>
        <input type="text" placeholder="Enter subject name" id="Subject" />
        <input type="hidden" value="" id="level" />
    </div>
    <div class="dialog-actions">
        <button class="button ">Add</button>
        <button class="button primary js-dialog-close">Cancel</button>
    </div>
</div>
@stop