@extends('back.app')
@section('title',"EDIT EXAM")
@section('content')

   <form method="post" class="inline-form">
   <input type="text" placeholder="Enter name" value="{{$examsubject->name}}" name="name">
   <input type="text" placeholder="Enter Fullmarks" value="{{$examsubject->fullmarks}}" name="fullmarks">
   <input type="text" placeholder="Enter PassMarks" value="{{$examsubject->passmarks}}" name="passmarks">
            <input type="submit" class="button success" style="top:-1px;" value="Save" />
   </form>

@stop