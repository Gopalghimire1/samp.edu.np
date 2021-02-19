@extends('front.app')
@section('title', $page->title)
@section('content')
    <link rel="stylesheet" type="text/css" href="/asset/css/zabuto_calendar.min.css">
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">{{ $page->title }}</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home </a></li>
                            <li class="active">Pages </li>
                            <li class="active">{{ $page->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">

                <!-- Card Regular -->
                <div class="card card-cascade">

                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="/assets/img/page/{{ $page->image }}" alt="Card image cap">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                {!! $page->body !!}
            </div>
        </div>
    </div>

@stop
