@extends('front.app')
@section('title',"Galary")
@section('content')

<section class="inner-header divider layer-overlay overlay-theme-colored-7"  data-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Our Gallery </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages </li>
                <li class="active">Gallery </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Gallery -->
    <section id="gallery">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Works Filter -->
              <div class="portfolio-filter font-alt align-center">
                <a href="#" class="active" data-filter="*">All</a>
                @foreach($galaries as $galary )
                <a href="#galary{{$galary->id}}" class="active" data-filter=".select{{$galary->id}}">{{$galary->title}}</a> 
                @endforeach
            </div>
            <!-- End Works Filter -->
            <!-- Portfolio Gallery Grid -->
            <div id="grid" class="gallery-isotope default-animation-effect grid-4 gutter clearfix" style="position: relative; height: 495px;">
            @foreach($galaries as $galary )
                @foreach($galary->getPhotos() as $photo)
                    <!-- Portfolio Item Start -->
                    <div class="gallery-item select{{$galary->id}}" style="position: absolute; left: 0px; top: 0px;">
                    <div class="thumb">
                        <img class="img-fullwidth" src="/{{$photo->filepath}}" alt="project">
                        <div class="overlay-shade"></div>
                        <div class="icons-holder">
                        <div class="icons-holder-inner">
                            <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
                            <a data-lightbox="image" href="/{{$photo->filepath}}"><i class="fa fa-plus"></i></a>
                            <a href="#"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        </div>
                        <a class="hover-link" data-lightbox="image" href="/{{$photo->filepath}}">अझै लोड गर्नु ोस् </a>
                    </div>
                    </div>
                    <!-- Portfolio Item End -->
                @endforeach
            @endforeach
            </div>
              <!-- End Portfolio Gallery Grid -->
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
@endsection