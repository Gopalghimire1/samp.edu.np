<div class="row">
<div class="col-md-6 col-lg-6">
  <span >
    Date
    <input type="text" id="datepicker"  style="padding:2px 2px 2px 5px;border-radius: 5px;" class="" name="date">
  </span>
</div>

<div class="col-md-6 col-lg-6">
 Classroom
  <select  class=" mar"  id="classroom" style="min-width:100px;font-size: 16px;font-family: 'Roboto';padding:2px 2px 2px 5px;padding:2px 2px 2px 5px;" >
    @foreach($classrooms as $classroom)
      <option value="{{$classroom->id}}">
      @if($classroom->section<>null & $classroom->section<>"")
      {{$classroom->level()->name}}- {{$classroom->section}}
      @else
      {{$classroom->level()->name}}
      @endif
      </option> 
    @endforeach
  </select>
  <button class="btn btn-primary btn-sm" onclick="
  selector = document.getElementById('classroom');
  value = selector[selector.selectedIndex].value;
  loadClassroom(value);"> 
          Load Class
  </button>
</div>


</div>
<hr/>


  
 