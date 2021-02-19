@extends('front.app')
@section('title',"Panel")
@section('content')
<div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">Parent Panel</h1>
</div>
<script>
    var currentyear=0;
    var currentmonth=0;
    var month = ["January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December"];

</script>
<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('parentpanel.menu')
            </div>
            <div class="col-md-8">
                   <style>
                       select{
                           padding:5px;
                           margin:0px 10px;
                           border: none;
                           border-bottom: 1px #bbb solid;
                       }
                       button.noborder{
                            padding:5px 20px;
                           margin:0px 10px;
                           border: none;   
                           background-color: transparent; 

                       }
                    </style>
                <div class="d-flex justify-content-center align-items-center">
                    <span>
                        <button onclick="prev()" class="noborder">
                                <i class="fas fa-chevron-circle-left"></i>
                        </button>
                            Year<select  id="year" onchange="change()">
                                    <script>
                                        for (let index = 2015; index <= (new Date()).getFullYear(); index++) {  
                                            if((new Date()).getFullYear()==index){
                                                document.write("<option value='"+index+"' selected>"+index+"</option>")
                                                currentyear=(new Date()).getFullYear();
                                            }else{
                                                document.write("<option value='"+index+"'>"+index+"</option>")
                                            }
                                        }
                                    </script>
                                </select>
                        Month<select name="date" id="month" onchange="change()">
                            <script>
                                for (let index = 0; index < month.length; index++) {
                                    const element = month[index];
                                    if((new Date()).getMonth()==index){
                                        document.write("<option value='"+index+"' selected>"+element+"</option>")
                                        currentmonth=(new Date()).getMonth();
                                    }else{

                                        document.write("<option value='"+index+"'>"+element+"</option>")
                                    }
                                
                                }
                            </script>
                        </select>
                        <button onclick="next()" class="noborder">
                                <i class="fas fa-chevron-circle-right"></i>
                        </button>
                    </span>
                </div>
                <hr style="color:#ccc;height:3px;"/>
                <div id='attendenceviwer'></div>
            </div>
        </div>
</div>

    @include('parentpanel.edit')
    @include('parentpanel.changepass')

@endsection
@section('script')
    <script>
        function prev(){
            currentmonth-=1;
            if(currentmonth<0){
                currentyear-=1;
                if(currentyear<2015){
                    toastem.error("Sorry We Don't have data before 2015");
                    currentyear=2015;
                    currentmonth=0;
                    document.querySelector('#year [value="' + currentyear + '"]').selected = true;
                    document.querySelector('#month [value="' + currentmonth + '"]').selected = true;
                    return;
                }
                currentmonth=11
            }
            document.querySelector('#year [value="' + currentyear + '"]').selected = true;
            document.querySelector('#month [value="' + currentmonth + '"]').selected = true;
            loadData();
        }

        function next(){
            currentmonth+=1;
            if(currentmonth>11){
                currentyear+=1;
                if(currentyear>(new Date()).getFullYear()){
                    currentyear=(new Date()).getFullYear();
                    currentmonth=11;
                    toastem.error("Sorry We Don't have data after "+currentyear);
                    document.querySelector('#year [value="' + currentyear + '"]').selected = true;
                    document.querySelector('#month [value="' + currentmonth + '"]').selected = true;
                    return;
                }
                currentmonth=0
            }
            document.querySelector('#year [value="' + currentyear + '"]').selected = true;
            document.querySelector('#month [value="' + currentmonth + '"]').selected = true;
            loadData();
        }

        function change(){
           var year=document.getElementById('year');
           currentyear=year.options[year.selectedIndex].value;
           var month=document.getElementById('month');
           currentmonth=month.options[month.selectedIndex].value;
           loadData();
        }
        
        function loadData(){
            axios.get('/api/students/attendance/'+{{$student_id}}+'/'+currentyear+'/'+(currentmonth+1)+'/')
            .then(function (response) {
                console.log(response);
                data=response.data;
                if(data.sucess){
                    students=data.data.attendances;
                    table="<table class='table'><tr><th>Date</th><th>Attendance Status</th></tr>";
                        for (let index = 0; index < students.length; index++) {
                            const element = students[index];
                            table+="<tr><td>"+element.date+"</td>";
                            if(element.att==1){
                                table+="<td>Present</td>";
                            }else{
                                table+="<td>Absent</td>";
                            }
                            table+="</tr>";
                        }
                    table+="</table>";
                    document.getElementById("attendenceviwer").innerHTML=table;
                }else{
                    p
                }   
            })
            .catch(function (error) {
            });
        }

        $(function(){
            loadData();
        });
    </script>
@stop