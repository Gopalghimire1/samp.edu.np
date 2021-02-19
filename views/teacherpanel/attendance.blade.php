@extends('front.app')
@section('title',"Panel")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Student Attendance</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Attendance</li>
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
            <div class="col-md-8">
                <a id="selectorlocation"></a>
                    @include('teacherpanel.selector',['classrooms'=>$classrooms])
                    <div style="border:1px #bbb solid;border-radius: 5px;display: none;" id="attendancemain">
                            <div style="border-bottom: 1px solid #ccc;padding:10px;font-size: 16px;font-weight: 400;" id="attendenceSelect">
                                <span style="margin:5px;">
                                    Date :<span id="seldate" style="min-width: 100px;margin-right: 10px;padding:5px;" data-date="" data-selected="false"> k</span>
                                    classroom :<span id="selclassroom" style="min-width: 100px; margin-right: 10px;padding:5px;"  data-classroom="" data-selected="false">k</span>
                            </span>
                            </div>
                        <div style="min-height:100px;border-bottom: 1px solid #ccc;" id="attendenceviwer">
                            
                        </div>
                        <div>
                                <button class="btn btn-primary" onclick="Save();"> 
                                    Save
                                </button>
                                <button class="btn btn-warning" onclick="reset();"> 
                                    Reset
                                </button>
                                <button class="btn btn-danger" onclick="cancel();"> 
                                    Cancel
                                </button>

                        </div>
                    </div>
            </div>
        </div>
</div>

    @include('teacherpanel.edit')
    @include('teacherpanel.changepass')

@endsection
@section('script')
<script>
        $( function() {
          $( "#datepicker" ).datepicker({
            format: "yyyy-mm-dd",
          });
          $( "#datepicker" ).datepicker().datepicker("setDate", new Date());
        
        });
            function initdata(){
               date= $("#datepicker" ).val();
               classroom=$('#classroom').val();
               axios.get('/api/attendance/'+date+'/'+classroom+'/')
                .then(function (response) {
                    console.log(response);
                    data=response.data;
                    if(data.success){
                        attendances=data.data.attendences;
                        for (let index = 0; index < attendances.length; index++) {
                            const attendance = attendances[index];
                            if(attendance.att==1){
                                document.getElementById('switch-'+attendance.student_id).checked=true;
                            }else{
                                document.getElementById('switch-'+attendance.student_id).checked=false;
                            }
                            document.getElementById('att-'+attendance.student_id).value=attendance.att;

                        }
                        document.getElementById('seldate').dataset.selected=true;
                        document.getElementById('selclassroom').dataset.selected=true;
                        document.getElementById('attendancemain').style.display='block';
                        toastem.success("Data Loaded");
                    }else{
                        toastem.error("Data Cannot Be Loaded");
                        console.log(data.error);
                    }

                })
                .catch(function (error) {
                    toastem.error("Data Cannot Be Loaded");
                    console.log(error);
                })
            }
            
            function Save(){
                if(document.getElementById('seldate').dataset.selected==false || document.getElementById('selclassroom').dataset.selected==false){
                    alert('Please Load Data First');
                }
                date= document.getElementById('seldate').dataset.date;
                classroom=document.getElementById('selclassroom').dataset.classroom;
                var attendancedata=new FormData();
                elems=document.querySelectorAll('.att');
                for (let index = 0; index < elems.length; index++) {
                   const element = elems[index];
                   console.log(element.value);
                   attendancedata.append(element.dataset.id,element.value);                   
               }
                axios.post('/api/attendance/'+date+'/'+classroom+'/', attendancedata)
                    .then(function (response) {
                        console.log(response);
                        data=response.data;
                        if(data.success){
                            toastem.success("Data Saved");
                        }else{
                            toastem.error("Data Can't Loaded");
                            console.log(data.error);
                        }
                    })
                    .catch(function (error) {
                        toastem.error("Data Can't Loaded");
                        console.log(error);
                    });
            }

            function changeStatus(slider){
                console.log(slider);
                    student_id=slider.dataset.id;

                    if(slider.checked){
                        document.getElementById('att-'+student_id).value=1;
                    }else{
                        document.getElementById('att-'+student_id).value=0;
                    }
                    console.log(document.getElementById('att-'+student_id));
            }

            function loadClassroom(classroom){
                date= $("#datepicker" ).val();
                classroom=$('#classroom').val();
                document.getElementById('seldate').dataset.date=date;
                document.getElementById('selclassroom').dataset.classroom=classroom;
                document.getElementById('selclassroom').innerText=$('#classroom').find("option:selected").text().trim();
                console.log($('#classroom').find("option:selected").text());
                document.getElementById('seldate').innerText=$("#datepicker" ).val();

                console.log(classroom);
                axios.get('/api/students/byclassroom/'+classroom+'/')
                .then(function (response) {
                    // handle success
                    // console.log(response);
                    var data=response.data;
                    if(data.success){

                        students=data.data.students;
                        students.sort(function(a, b) {
                            return parseInt(a.roll)-parseInt(b.roll);
                        });
                        var table="<table class='table'>\
                                    <tr>\
                                        <th>Roll No</th>\
                                        <th>Name</th>\
                                        <th></th>\
                                    </tr>";
                                    
                                   
                        for(var i=0;i<students.length;i++){
                           var student=students[i];
                            table+="<tr>\
                                        <td>"+student.roll+"</td>\
                                        <td>"+student.name+"</td>\
                                        <td>\
                                        <label  class='bs-switch'>\
                                            <input class='sliderinner' type='checkbox' id='switch-"+ student.id+"' data-id='"+student.id+"' onchange='changeStatus(this);'>\
                                            <span  class='slider round'></span>\
                                            </label>\
                                            <input class='att' type='hidden' data-id='att-"+student.id+"' id='att-"+student.id+"' value='0'>\
                                        </td>\
                                    </tr>";
                        }
                        table+="</table>";
                        document.getElementById('attendenceviwer').innerHTML=table;
                    }else{
                        toastem.error("Data Cannot Be Loaded");
                        console.log(data.error);
                    }
                })
                .catch(function (error) {
                    // handle error
                    toastem.error("Data Cannot Be Loaded");
                    console.log(error);
                })
                .then(function () {
                    // always executed
                    initdata();
                });
            }
            
            function reset(){
                elems=document.querySelectorAll('.sliderinner');
                for (let index = 0; index < elems.length; index++) {
                   const element = elems[index];
                   element.checked=false;
               }
               elems=document.querySelectorAll('.att');
                for (let index = 0; index < elems.length; index++) {
                   const element = elems[index];
                   element.value=0;
               }
                console.log(elems);
                toastem.warning("Reset Data");
            }

            function check(){
              
            }
            
            function cancel(){
                document.getElementById('seldate').dataset.date="";
                document.getElementById('selclassroom').dataset.classroom="";
                document.getElementById('selclassroom').innerText="";
                document.getElementById('seldate').innerText="";
                document.getElementById('seldate').dataset.selected=false;
                document.getElementById('selclassroom').dataset.selected=false;
                document.getElementById('attendancemain').style.display='none';
                document.getElementById('attendenceviwer').innerHTML="";
                document.getElementById('selectorlocation').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        </script>
@endsection

