@extends('back.app')
@section('title','EDIT STUDENT')
@section('content')
<div id="addparent" style="position: absolute;width:100%;height:100%;display:none;z-index: 3;background-color: white;overflow: scroll;padding:5px;">
        <h4>Add Parent</h4>
        <hr/>    
    <form method="post" id="addParent_form">
            
                <div class="form-group">
                    <label>Name</label>
                    <input type="text"  name="name" id="addparent_name" placeholder="Enter Name"/>
                </div>
                <div class="form-group">
                        <label>Adress</label>
                        <input type="text"  name="adress" id="addparent_adress" placeholder="Enter Adress"/>
                </div>
                <div class="form-group">
                        <label>Email</label>
                        <input type="email"  name="email" id="addparent_email" placeholder="Enter Email Adress"/>
                </div>
                <div class="form-group">
                        <label>Phone</label>
                        <input type="text"  name="phone" id="addparent_phone" placeholder="Enter Phone number"/>
                </div>

                <div class="form-group">
                    <input type="button" class="button sucess"  onclick="addParent();"  value="Submit data" class="Add Parent"/>
                    <input type="button" class="button" value="Cancel" onclick="
                    document.getElementById('addparent').style.display='none';
                    document.getElementById('addParent_form').reset();
                    ">
                </div>
            </form>
</div>


<div class="container">
        <h4>Edit Student</h4>
        <hr/>
        <form method="post" >
            
            <div class="form-group">
                <label>Name</label>
                <input type="text"  name="name" placeholder="Enter Name" value="{{$student->name}}"/>
            </div>
            <div class="form-group">
                <label>Level/Class</label>
                <select data-filter-placeholder="Search Level/Class"   name="level_id" data-role="select" id="level_id">
                            @foreach ($levels as $level)
                            <option value="{{$level->id}}" 
                                @if($student->level_id==$level->id)
                                    selected
                                @endif
                                >
                                {{$level->name}}
                            </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label>Classroom</label>
                    <select data-role='select' data-filter-placeholder="Search ClassRoom" onchange="console.log(this);" name="classroom_id" id="classroom_id">                    >
                    @foreach ($classrooms as $classroom)
                    <option value="{{$classroom->id}}"
                            @if($student->classroom_id==$classroom->id)
                                        selected
                            @endif
                        >
                            {{$classroom->level()->name}}
                                @if($classroom->section!=null )
                                    - {{$classroom->section}}
                                @endif
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group" style="border: 1px grey solid;padding: 5px;">
                    <label style="margin-right:10px;">Parent </label>
                    <div class="container">
                        <span class="button" onclick="
                        document.getElementById('addparent').style.display='block';
                        ">Add</span>
                        <span class="button searchtoogle" id="parentsearch_btn" >Search</span>
                        <span class="button" 
                        onclick="
                            document.getElementById('schoolparent_id').value='';
                            document.getElementById('parentname').innerText='';
                        "
                        >Clear</span>
                        <div class="pos-relative">
                                <div 
                                        id="searchblock"
                                        data-role="collapse"
                                        data-collapsed="true"
                                        data-toggle-element=".searchtoogle">
                                    <div id="searchbar" style="padding:5px;">
                                        <div class="row" >
                                            <div class="cell-4">
                                                <input type="text" data-role="input"  id="searchvalue">
                                            </div>
                                            <div class="cell-4">
                                                <select name="" id="searchtype" data-role="select">
                                                    <option value="0">Name</option>
                                                    <option value="1">Adress</option>
                                                    <option value="2">Phone Number</option>
                                                </select>

                                            </div>
                                            <div class="cell-4">
                                                <span class="button fg-white bg-blue" data-role="button" onclick="populateParents()">
                                                    <span class="mif-search"></span>
                                                    Search
                                                </span>
                                            
                                                    <span class="button fg-black bg-white searchtoogle" data-role="button" >
                                                        <span class="mif-keyboard-return"></span>
                                                        
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                    <div>
                                            <table class="table"  >
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Name
                                                        </th>
                                                        <th>
                                                            Adress
                                                        </th>
                                                        <th>
                                                            Phone
                                                        </th>
                                                        <th>
                                                            Email Adress
                                                        </th>
                                                        <th>
                                                        
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableitems">
                                                </tbody>
                                                
                                            </table>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        <div style="padding: 5px;" id="parentname">
                            Name:&nbsp{{$student->studentparent()->name}},&nbsp
                            Adress:&nbsp{{$student->studentparent()->adress}},&nbsp
                            Phone:&nbsp{{$student->studentparent()->phone}}&nbsp

                        </div>
                    </div>
                <input type="hidden" name="studentparent_id" id="schoolparent_id" value="{{$student->studentparent_id}}" required/>
            </div>
            
            <div class="form-group">
                <label>Adress</label>
            <input type="text"  name="adress" placeholder="Enter Adress" value="{{$student->adress}}"/>
            </div>
            <div class="form-group">
                    <label>Email</label>
                    <input type="email"  name="email" placeholder="Enter Email Adress" value="{{$student->email}}"/>
            </div>
            <div class="form-group">
                    <label>Phone</label>
                    <input type="text"  name="phone" placeholder="Enter Phone Number" value="{{$student->phone}}"/>
            </div>
            <div class="form-group">
                    <label>Roll no</label>
                    <input type="text"  name="roll" placeholder="Enter Roll Number" value="{{$student->roll}}"/>
            </div>
            <div class="form-group">
                <button class="button success">Submit data</button>
                <input type="button" class="button" value="Cancel" onclick="window.location.href='/admin/student/list/'">
            </div>
        </form>
</div>
<script>
    function addParent(){
        var formdata=new FormData(document.getElementById('addParent_form'));
        for (var pair of formdata.entries()) {

            if(pair[1]==null || pair[1]==""){
                var toast = Metro.toast.create;
                toast("Please Enter all values");
                return; 
            }
        }
        axios.post('/admin/parent/add/', {
            name:document.getElementById('addparent_name').value,
            adress:document.getElementById('addparent_adress').value,
            email:document.getElementById('addparent_email').value,
            phone:document.getElementById('addparent_phone').value,
        })
        .then(function (response) {
            console.log(response.data);
            var data=response.data;
            document.getElementById("schoolparent_id").value=data.id;
            document.getElementById("parentname").innerText="Name: "+data.name +", Adress: "+ data.adress+",  Phone no: "+data.phone;
            document.getElementById('addparent').style.display='none';
            
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    function populateParents(){
        axios.post('/admin/parent/search/', {
            value:document.getElementById('searchvalue').value,
            type:document.getElementById('searchtype').value,
        })
        .then(function (response) {
            console.log(response.data);
            var obj=response.data;
            document.getElementById('tableitems').innerHTML="";
            for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                    var parent = obj[key];
                    var temp="Name: "+parent.name +", Adress: "+ parent.adress+",  Phone no: "+parent.phone;

                    document.getElementById('tableitems').innerHTML+="<tr><td>"+parent.name+"</td><td>"+parent.adress+"</td><td>"+parent.phone+"</td><td>"+parent.email+"</td><td><span class='button bg-green' onclick='selectParent("+parent.id+",\""+temp+"\")'>Select</span></td></tr>";
                }
            }
            var el = $('#searchblock').data('collapse');
            console.log(el);
        
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function selectParent(id,name){
        document.getElementById("schoolparent_id").value=id;
            document.getElementById("parentname").innerText=name;
    }
</script>

@stop