@extends('front.app')
@section('title',"MOCKTEST")
@section('content')

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Mock Test</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Mocktest</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container" >
   
   <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
           <div class="col-md-3">
               @include('studentpanel.menu')
           </div>
           <div class="col-md-8">
           @foreach($mockquestion as $mock)
             <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Question No.{{$mock->id}}</h5>
                </div>
                <div class="panel-body">
                   <p>{{$mock->question}}</p>
                   <hr>
                   <p><input type="checkbox"></p>
                   <p><input type="checkbox"></p>
                   <p><input type="checkbox"></p>
                   <p><input type="checkbox"></p>
                </div>
            </div>
           @endforeach
           </div>
      
   </div>
</div>

@include('studentpanel.edit')
@include('studentpanel.changepass')


@endsection