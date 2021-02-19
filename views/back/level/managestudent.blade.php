@extends('back.app')
@section('title','Manage Students')
@section('content')

        <button onclick="selectAll(this);" class="button warning mini rounded" >Select All</button>

        <form method="POST">
<table class="table">
    <thead>
    <tr>
        <th></th>
        <th>
        Name
        </th>
        <th>
        Roll no
        </th>
    </tr>
    @foreach($students as $student)
    <tr>
    <td>
    <input class="stdselector" type="checkbox" name="check-{{$student->id}}" id="check-{{$student->id}}" data-roll="roll-{{$student->id}}" onchange="document.getElementById('roll-{{$student->id}}').disabled=!this.checked;">
    </td>
    <td>
    {{$student->name}}
    </td>
    <td>
    <input disabled type="text" name="roll-{{$student->id}}" id="roll-{{$student->id}}" data-role="input" data-prepend="Roll no." value="{{$student->roll}}">

    </td>
    </tr>
    @endforeach
    </thead>
</table>
    <hr/>
<table>
    <tr>
        <td>
        <input type="checkbox" onchange="
        document.getElementById('level').disabled=!this.checked;
        " data-role="switch" data-caption="Change Level/Class" name="changeclass" onkeydown="return event.keyCode != 13;">
        </td>
        <td>
        <select data-role="select" name="newlevel" id="level" disabled style="width:100px;">
        @foreach($levels as $level)
        <option value="{{$level->id}}"
            @if($level->id==$currentlevel)
            selected
            @endif>{{$level->name}}</option>
        @endforeach
        </select>   
        </td>
        <td><button style="margin-left: 10px;" class="button success">Save</button></td>
    </tr>
</table>
</form>

    <script>
        var selected=false;
        function selectAll(p) {
            console.log(p);
            if(selected===true){
                selected=false;
                p.innerText="Select All";
            }else if(selected===false){
                selected=true;
                p.innerText="Unselect All";
            }
            var x = document.querySelectorAll(".stdselector");
            for (let index = 0; index < x.length; index++) {
                var element = x[index];
                document.getElementById(element.dataset.roll).disabled=!selected;
                element.checked=selected;
                console.log(element);
            }
        }
        function unSelectAll(){
            var x = document.querySelectorAll(".stdselector");
            for (let index = 0; index < x.length; index++) {
                var element = x[index];
                document.getElementById(element.dataset.roll).disabled=true;
                element.checked=false;
                console.log(element);
            }
        }
    </script>
@stop