@extends('front.app')
@section('title', 'News Detail Page')
@section('content')

    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/sai.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">News</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home</a></li>
                            <li class="active">Pages </li>
                            <li class="active">News Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section: result -->
    <section class="bg-light">
        <div class="container">
            <!-- <div class="section-title text-center">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Latest <span class="text-theme-colored2">results</span></h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                </div>
              </div>
            </div> -->
            <div class="row">
               
                <div class="col-md-12">
                    
                    <div class="feature-wrapper mb-30">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="/{{ $news->photo }}" title="click to view large" target="_blank">
                                    <img src="/{{ $news->photo }}" style="width:100%" alt="Click here to view.."/>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="feature-title-heading">
                                    <h3>{{ $news->title }}</h3>
                                    <span></span>
                                <p>{{$news->news}}</p>
                                </div>
                                <div style="padding:.7rem 0;">
                                    <small class="text-info pull-right" style="color: #f80!important;"><i class="fa fa-user-circle"
                                            aria-hidden="true"></i> - {{ $news->publisher }}, {{ $news->published }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection
