@extends('back.app')
@section('title',"CLASSCHEDULE")
@section('content')
<script> 
        var array=[];
        var starttime="9:00 am";
        var endtime="5:00 pm";
        array[1]=[];array[2]=[];array[3]=[];array[4]=[];array[5]=[];array[6]=[];array[7]=[];
        @foreach($cls->Classchedule as $classschedule)
            array[{{$classschedule->dayofweek}}].push(
                {"start":'{{$classschedule->starttime}}',"end":"{{$classschedule->endtime}}","title":"{{$classschedule->teacher->name}} - {{$classschedule->subname}}"}
            );
        @endforeach
    </script>

    <body onload="loadschedule()">

    <div style="overflow-:scroll">
            <div id="streamer" style="height:350px;">
                    <div id="timeline" style="height:50px;border-bottom:1px solid #f1f1f1;">
        
                    </div>
                <button style="position: absolute;top:50px;;left:0;height:50px;width:100px;">Mon</button>
                <button style="position: absolute;top:100px;left:0;height:50px;width:100px;">Thu</button>
                <button style="position: absolute;top:150px;left:0;height:50px;width:100px;">Wed</button>
                <button style="position: absolute;top:200px;left:0;height:50px;width:100px;">Ths</button>
                <button style="position: absolute;top:250px;left:0;height:50px;width:100px;">Fri</button>
                <button style="position: absolute;top:300px;left:0;height:50px;width:100px;">Sat</button>
                <button style="position: absolute;top:350px;left:0;height:50px;width:100px;">Sun</button>

            </div>
    </div>
   

<div style="padding:5rem;">
<form method="post" action="/admin/clsschedule/Manage/{{$cls->id}}/">
    
<div class="row">
      <div class="cell-md-6">
      <Label>Subject Name</Label>
      <input type="text" name="subname" placeholder="Enter subject name">
      </div> 

      <div class="cell-md-3">
      <label for="">Start Time</label>
      <input data-role="timepicker" name="starttime"  />
      </div>

      <div class="cell-md-3">
      <label for="">End Time</label>
      <input data-role="timepicker" name="endtime"/>
      </div>
        
      <div class="cell-md-6">
      <label for="">Teachers Name</label>
      <select name="teacher_id" id="teacher_id" data-role='select'>
      @foreach($teach as $teacher)
            <option value="{{$teacher->id}}">
                {{$teacher->name}}
            </option>
      @endforeach
      </select>
      </div>
        <div class="cell-md-3">
      <label for="">Day of The Week</label>
        <select data-role="select" name="dayofweek" id="day">
        <option value="1">Monday</option>
        <option value="2">Tuesday</option>
        <option value="3">wednesday</option>
        <option value="4">Thursday</option>
        <option value="5">Friday</option>
        <option value="6">Saturday</option>
        <option value="7">Sunday</option>
      </select>
        </div>
      <div class="cell=md-3" style="margin-top:1.5rem;">
     <button onclick="loaddata(this)"  class="button success">LOAD DATA</button>
       </div>
    </div>
    
</form>

</div>

<script>
        function loadschedule(){
            opening=new Date("01/01/2007 " + "9:00 am");
            closing=new Date("01/01/2007 " + "5:00 pm");
            currentime=opening;
            var html="";
            var count=0;
            for(let index = 0; index <= 7; index++) {
                if(array[index]){
                    console.log(array[index]);
                    var ele=array[index]
                    for (let i = 0; i < ele.length; i++) {
                        const element = ele[i];
                        var timeStart = new Date("01/01/2007 " + element.start);
                        var timeEnd = new Date("01/01/2007 " + element.end);
                        var diff=timeEnd-timeStart;
                        var pixel=diff/10000;
                        var start=(timeStart-opening)/10000;
                        html+="<button style='position:absolute;height:50px;top:"+((count*50)+50)+"px;left:"+(start+100)+"px;width:"+pixel+"px;border-right:1px solid #f1f1f1;'>"+element.title+"</button>";
                    }   
                    count+=1;
                } 
            }
            console.log(html);
            $('#streamer').append(html);
            html1="";
            console.log(currentime);
            console.log(closing);
            while(currentime<closing){
                var start=(currentime-opening)/10000;
                html1+="<span style='position:absolute;height:50px;left:"+(start+100)+"px;width:"+pixel+"px;border-right:1px solid #f1f1f1;'>"+currentime.getHours()+":"+currentime.getMinutes()+"</span>";
                currentime=new Date(currentime.getTime() + (30*60000));
                console.log(currentime);
                console.log(closing);                
            }
            $('#timeline').append(html1);
        }

        function loaddata(){

        }
    </script>
     
@endsection