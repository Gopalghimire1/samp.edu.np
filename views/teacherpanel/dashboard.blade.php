@extends('front.app')
@section('title',"Panel")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Teacher Panel</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Panel</li>
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
                    
            </div>
        </div>
</div>

    @include('teacherpanel.changepass')

@stop