@extends('front.app')
@section('title',"SCHEDULE")
@section('content')
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Class Schedule</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Schedule</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
                <div class="col-md-3">
                    @include('teacherpanel.menu')
                </div>
                <div class="col-md-8" style="width:100vh;overflow-x:scroll;">
                            <script> 
                                var array=[];
                                var starttime="9:00 am";
                                var endtime="5:00 pm";
                                array[1]=[];array[2]=[];array[3]=[];array[4]=[];array[5]=[];array[6]=[];array[7]=[];
                                @foreach($cls as $classschedule)
                                    array[{{$classschedule->dayofweek}}].push(
                                        {"start":'{{$classschedule->starttime}}',"end":"{{$classschedule->endtime}}","title":"{{$classschedule->teacher->name}} - {{$classschedule->subname}}"}
                                    );
                                @endforeach
                            </script>
                        <div>
                            <div >
                                    <div id="streamer" style="height:500px;position:relative;">
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
                        </script>
                </div>
        </div>
    </div>
        <script>
            window.onload=function(){
            loadschedule();
        };
        </script>
    @include('teacherpanel.edit')
    @include('teacherpanel.changepass')
@endsection