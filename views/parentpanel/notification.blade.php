@extends('front.app')
@section('title',"Panel")
@section('content')
<div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">Parent Panel > Result</h1>
</div>

<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('parentpanel.menu')
            </div>
            <div class="col-md-8">
                @foreach(\Controllers\ParentController::getMessages($parent->id) as $notification)
                    {{$notification->message}} <hr>
                @endforeach
                <?php
                    \Controllers\ParentController::readMessages($parent->id);
                ?>
            </div>
        </div>
</div>

    @include('parentpanel.edit')
    @include('parentpanel.changepass')

@stop