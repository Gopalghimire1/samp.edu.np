@foreach(Models\Studentinbox::where('student_id',$student->id)->get() as $note)
    <div class="alert 
    @if($note->type==0)
    alert-danger
    @elseif($note->type==1)
    alert-success
    @else
    alert-info
    @endif
    alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   {{$note->message}}
</div>
@endforeach