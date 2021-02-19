@extends('front.app')
@section('title',"Panel")
@section('content')
<div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">Parent Panel > Result > Students</h1>
</div>

<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('parentpanel.menu')
            </div>
            @if(count($students)==0)
                <div style="text-align:center">
                    <h2>There are not any student added to this account</h2>
                </div>
            @else
            <div class="col-md-8">
                <ul class="list-group">
                    @if($type=="1")
                        @foreach($students as $student)
                            <li class="list-group-item"> <a href="/parent/result/student/{{$student->id}}/">{{$student->name}}</a></li>
                        @endforeach
                    @else
                        @foreach($students as $student)
                            <li class="list-group-item"> <a href="/parent/attendance/student/{{$student->id}}/">{{$student->name}}</a></li>
                        @endforeach
                    @endif
                </ul>

                
            </div>
            @endif
        </div>
</div>

    @include('parentpanel.edit')
    @include('parentpanel.changepass')

@stop