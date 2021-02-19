@extends('back.app')
@section('title',"Add Receipt")
@section('content')
<script>
    
</script>
<div class="container">
    <div id="header">
        <h1>Add New Receit</h1>
    </div>
    <div >
        <form  method="post" onsubmit="return check();">
            <div class="row " style="margin:10px 0px;">
                <div class="cell-md-9 cell-sm-12">
                    Title <br>
                    <input type="text" name="title" id="title" required>
                </div>
                <div class="cell-md-3 cell-sm-12">
                Issue date <br>
                <input data-role="datepicker" name="issuedate" required>
                </div>
                <div class="cell-md-3 cell-sm-12">
                Due date <br>
                <input data-role="datepicker" name="duedate" required>
                </div>
            </div>
            <hr>
            <div class="row" style="margin:10px 0px;">
                <div class="cell-md-3 cell-sm-6" id="billheader">
                    Particular<br>
                    <input type="text"  style="display:inline;" id="particular"  >
                </div>
                <div class="cell-md-3 cell-sm-6" id="billheader">
                    Rate<br>
                    <input type="number"  style="display:inline;" id="rate" min="0" >
                </div>
                <div class="cell-md-3 cell-sm-6" id="billheader">
                    Qty<br>
                    <input type="number"  style="display:inline;" id="qty" min="1" >
                </div>
                <div class="cell-md-3 cell-sm-6">
                    <br>
                    <div class="button success w-50" onclick="addBillItem()">Add</div> 
                </div>
            </div>
            
            <div class="row " style="border:1px solid #f1f1f1;margin:10px 0px;">
                <div class="cell-12">
                
                    <table class="table table-border striped" id="billitems" style="border-bottom:2px solid #f1f1f1;">
                    <tr>
                        <th>Particular</th>
                        <th>Rate</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </table>
                </div>
                <div class="cell-12">
                    <div class="row" >
                        <div class="cell-6">
                            Total <br><input class="" name="total" id="total" type="number" value="0" />
                        </div>
                        <div class="cell-6">
                            Discount <br><input class="" name="discount" id="discount" type="number" value="0" />
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="selector" class="row m-0" >
                <div id="add" class="cell-12" data-role="panel" data-title-caption="<div style='text-align:center;font-weight:bold;'>Select Students</div>">
                </div>
                <div data-role="panel" data-title-caption='<input type="radio" name="addselect" value="1"  onChange="sel(1);"  data-role="radio"  data-caption="Level">' class="cell-md-6 cell-sm-12">
                    <select id="select1" data-id="1" class="_sel" name="select1[]" multiple style="height:200px;"  disabled onchange="selByLevel(this)">
                        @foreach(\Models\Level::all() as $level)
                            <option value="{{$level->id}}">
                                {{$level->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div data-role="panel" data-title-caption='<input type="radio" name="addselect" value="2" onclick="sel(2);" data-role="radio" data-caption="Classrooms">' class="cell-md-6 cell-sm-12" >
                    <select id=select2 class="_sel" data-id="2"  name="select2[]" multiple style="height:200px;"  disabled onchange="selByClass(this)">
                        @foreach(\Models\Classroom::all() as $classroom)
                        <option value="{{$classroom->id}}">
                                {{$classroom->level()->name}}
                                @if($classroom->section!=null )
                                    - {{$classroom->section}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div data-role="panel" data-title-caption='<input oninput="search(this)" style="width:auto;">' class="cell-12" >
                    <select  id="select3"  name="students[]" multiple style="height:200px;" required>
                       
                    </select>
                </div>
            </div>
            <div style="padding:10px 0;">
            <input type="hidden" name="billitemcount" id="billitemcount" value="0">
            <button class="button success">Save</button>
            </div>
        </form>
    </div>

</div>


@endsection
@section('script')
<script>
    var levels=[];
    @foreach(\Models\Level::all() as $level)
    levels['level-{{$level->id}}']=[
        @foreach($level->Students as $student)
                  {"id":"{{$student->id}}","name":"{{$student->name}}","roll":"{{$student->roll}}"},                 
        @endforeach
        ];
    @endforeach
    var classrooms=[];
    @foreach(\Models\Classroom::all() as $Classroom)
    classrooms['class-{{$Classroom->id}}']=[
        @foreach($Classroom->Students() as $student)
                  {"id":"{{$student->id}}","name":"{{$student->name}}","roll":"{{$student->roll}}"},                 
        @endforeach
        ];
    @endforeach
    var total=0;
    var count=0;
    billcount=0;
    function addBillItem(){
        var par=$('#particular').val();
        var rate=$('#rate').val();
        var qty=$('#qty').val();
        if(par.trim()==""){
            return;
        }
        if(rate.trim()=="" || rate<1){
            return;
        }
        if(qty.trim()=="" || qty<1){
            return;
        }

        
        console.log(rate*qty);
        var _total=rate*qty;
        var ele='<tr  class="text-center" id="billitem'+count+'"><td>'+par+'</td><td>'+rate+'</td><td>'+qty+'</td><td>'+_total+'</td><td><span data-rate="'+rate+'" data-qty="'+qty+'" data-total="'+_total+'" data-id="'+count+'" class="button alert" onclick="removeBillItem(this)">-</span></td> <td>     <input type="hidden" name="particular[]" value="'+par+'"><input type="hidden" name="rate[]" value="'+rate+'"><input type="hidden" name="qty[]" value="'+qty+'"></td></tr>';
        console.log(ele);
        $('#billitems').append(ele);
        total+=_total;
        count+=1;
        billcount+=1;
        $('#billitemcount').val(billcount);
        $('#total').val(total);
        $('#particular').val("");
        $('#rate').val("");
        $('#qty').val("");
    }

    function removeBillItem(ele){
        console.log(ele.dataset);
        _total=ele.dataset.total;
        _id=ele.dataset.id;
        total-=_total;
        $("#billitem"+_id).remove();
        $('#total').val(total);
        billcount-=1;;

    }

    function search(ele){
        searchval=ele.value;
        select=document.getElementById("select3");
        var result = [];
        var options = select && select.options;
        var opt;

        for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];
            if (opt.text.toLowerCase().includes(searchval.toLowerCase())) {
                opt.style.display="block";
            }else{
                opt.style.display="none";
            }
        }
    }

    function selByClass(ele){
        var options = ele && ele.options;
        var opt;
        document.getElementById('select3').innerHTML="";
        var html="";
        for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];
            if(opt.selected){
                if(classrooms['class-'+opt.value].length>0){
                    html+="<optgroup label='Classroom - "+opt.text+"'>"
                        for (let index = 0; index < classrooms['class-'+opt.value].length; index++) {
                            const element = classrooms['class-'+opt.value][index];
                            console.log(element);
                            html+="<option value='"+element.id+"' selected>"+element.name+"-"+element.roll+"</option>";
                        }
                    html+="</optgroup>"
                }
            }
        }
        document.getElementById('select3').innerHTML=html;
    }
    function selByLevel(ele){
        var options = ele && ele.options;
        var opt;
        document.getElementById('select3').innerHTML="";
        var html="";
        for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];
            if(opt.selected){
                if(levels['level-'+opt.value].length>0){
                    html+="<optgroup label='Level- "+opt.text+"'>"
                        for (let index = 0; index < levels['level-'+opt.value].length; index++) {
                            const element = levels['level-'+opt.value][index];
                            console.log(element);
                            html+="<option onmousedown='selStudent(event,this);' value='"+element.id+"' selected>"+element.name+"-"+element.roll+"</option>";
                        }
                    html+="</optgroup>"
                }
            }
        }
        document.getElementById('select3').innerHTML=html;
    }

    function check(){
        if(billcount<1){
            return false;
        }

        if(total<$('#discount').val()){
            return false;
        }
    }
    function clearSelected(id)
    {
	    var elements = document.getElementById(id).options;
        for(var i = 0; i < elements.length; i++){
        if(elements[i].selected)
            elements[i].selected = false;
        }
    }
    function sel(id){
        console.log(id);
        var selects=document.querySelectorAll('._sel');
        for (let index = 0; index < selects.length; index++) {
            const element = selects[index];
            console.log(element);
            if(element.dataset.id==id){
                element.disabled=false;
            }else{
                element.disabled=true;
            }
        }
        clearSelected('select1');
        clearSelected('select2');

    }
    function reset(){
        document.getElementById('select3').innerHTML="";
        clearSelected('select1');
        clearSelected('select2');
    }

    function selStudent(e,ele){
        console.log(e);
        console.log(ele);
        document.getElementById('select3').focus();        
        e.preventDefault();
        ele.selected=!ele.selected;
        return false;
    }
</script>
    <script>
         $('#select1 option').mousedown(function(e) {
            e.preventDefault();
            $(this).prop('selected', !$(this).prop('selected'));
            selByLevel(document.getElementById('select1'));
            document.getElementById('select1').focus();

            return false;
        });
        $('#select2 option').mousedown(function(e) {
             console.log(e);
            e.preventDefault();
            $(this).prop('selected', !$(this).prop('selected'));
            selByClass(document.getElementById('select2'));
            document.getElementById('select2').focus();
            return false;
        });
        $('#select3 option').mousedown(function(e) {
            e.preventDefault();
            $(this).prop('selected', !$(this).prop('selected'))
            return false;
        });
    </script>
@endsection