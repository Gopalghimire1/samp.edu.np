@extends('front.app')
@section('title',"HOME")
@section('content')
@include('front.landing.intro')
<style>

</style>
  <!-- Section: home-boxed -->
  <section>
      <div class="container pb-0">
        <div class="section-content">
          <div class="row"  data-margin-top="-150px">
      
            {{-- <div class="col-md-4">
              <div class="icon-box text-center p-40 mb-sm-50 border-2px border-theme-colored2" data-bg-img="/assets/img/j.jpg">
                <div>
                <span class="typed-text-carousel font-20 text-white" data-speed="50" data-back_delay="600" data-loop="true">
                <span class="">नरग्राम माध्यमिक बिधालय स्वागत गर्दछ </span>
                <span class="">नयाँ सैक्षिक सत्र २०७७ को भर्ना खुल्ला छ</span>
                </span>
                <h2 class="font-54 text-white">भर्ना खुल्ला छ </h2>
                <a href="#" class="btn btn-default text-theme-colored mt-5 mb-10">अनलाइन फारम </a>
                </div>
              </div>
            </div> --}}
            <style>
              .hello{
                width: 600px;
                height: 200px;
  
                transition: width 3s, height 0.5s;
              }
              div.hello:hover{
                
                
                width: 100%;
                height: 283px;
              }
              
              .hello1{
                  display:none;
                  padding:30px 0px;
              }
              @media only screen and (max-width: 600px) {
                  .hello {
                    display:none;
                  }
                  
                  .hello1{
                      display:block;
                      padding:30px 0px;
                  }
                }
            </style>
            <div class="hello d-none d-md-block" >
              <div class="icon-box iconbox-border border-theme-colored2 bg-theme-colored  p-40 mb-sm-50">
                  <i class="fa  text-center"><span class="text-white">“ नरग्राम नमुना माध्यमिक बिधालय </span><span class="text-theme-colored2">तपाइँलाई हार्दिक स्वागत गर्दछ ”।</span></i>
                  
                  </a>
                  <div class="icon-box-title mt-50 text-center "><h3 class="text-theme-colored2">“सामाजिक आकांक्षा सापेक्ष शिक्षा हाम्रो अभियान</h1>
                  <h3 class="text-white">ज्ञान सीप र प्रविधि प्रयोगको थलो हो नरग्राम”। </h3></div>
                  {{-- <p class="text-white mb-20">nepali sewa</p> --}}
                </div>
            </div>
            <div class="hello1 " >
              <div class="icon-box iconbox-border border-theme-colored2 bg-theme-colored  "  style="padding: 30px 0px;">
                  <i class="fa  text-center"><span class="text-white">“ नरग्राम नमुना माध्यमिक बिधालय </span><span class="text-theme-colored2">तपाइँलाई हार्दिक स्वागत गर्दछ ”।</span></i>
                  
                  </a>
                  <div class="icon-box-title  text-center "><h3 class="text-theme-colored2">“सामाजिक आकांक्षा सापेक्ष शिक्षा हाम्रो अभियान</h1>
                  <h3 class="text-white">ज्ञान सीप र प्रविधि प्रयोगको थलो हो नरग्राम”। </h3></div>
                
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- section: notice -->
<section class="bg-silver-light">
 <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="text-uppercase line-bottom-double-line-centered mt-0">नयाँ  <span class="text-theme-colored2">सूचना </span></h2>
              <p>हाम्रा हालचाल का  सूचना यसै पृष्ठमा हेर्नुहोस  <br> सम्पूर्ण सूचना का लागि <strong>सूचना </strong>मेनु मा खोज्नु होला </p>
            </div>
          </div>
        </div>
 <div class="row">
 @foreach($notices as $notice)
    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="feature-wrapper mb-30">
        <div class="feature-title-heading">
          <h3><a href="/notice/single/{{ $notice->id }}/">{{$notice->title}}</a></h3>
          <span></span>
          </div>
          <div class="feature-text">
          <p>{{substr($notice->description,0,100)}}...</p>
        </div>
        <div style="padding:.7rem 0;">
        <small class="text-warning pull-left" style="color: #f80!important;"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> - {{$notice->published}}</small>
        <small class="text-info pull-right" style="color: #f80!important;"><i class="fa fa-user-circle" aria-hidden="true"></i> - {{$notice->publisher}}</small>
        </div>
      </div>
    </div>
  @endforeach
  </div>
 </div>
</section>


      <!-- Section: teachers -->
      <section id="team">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="text-uppercase line-bottom-double-line-centered mt-0">हाम्रा  <span class="text-theme-colored2">शिक्षक समूह </span></h2>
              <p>यो समुहको बिषय मा छोटो जानकारी  <br>जानकारी यहा </p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row mtli-row-clearfix">
            <div class="owl-carousel-4col">
            @foreach($teachers as $teacher)
              <div class="item">
                <div class="team-members maxwidth400">
                  <div class="team-thumb">
                    <img class="img-fullwidth" alt="" src="/{{$teacher->photo}}">
                  </div>
                  <div class="bg-lighter border-1px text-center p-10 pt-20 pb-10">
                    <h3 class="mt-0"><a class="text-theme-colored2" href="/teacher/single/{{$teacher->id}}/">{{$teacher->name}}</a></h3>
                    <h5 class="text-theme-color">{{$teacher->education}}</h5>
                  </div>
                  <div class="bg-theme-colored text-center pt-5">
                    <ul class="styled-icons">
                      <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                      <li><a href="#"><i class="fa fa-skype text-white"></i></a></li>
                    </ul>                  
                  </div>
                </div>              
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>


     <!-- Section: news -->
     <section id="blog" class="bg-silver-light">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="text-uppercase line-bottom-double-line-centered mt-0">ताजा  <span class="text-theme-colored2">गतिबिधि</span></h2>
              <p>गतिबिधि समूह सम्बन्धि छोटो जानकारी <br>.....................</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-3col owl-nav-top" data-nav="true">
        @foreach($news as $new)
                <div class="item">
                  <article class="post clearfix campaign mb-30">
                    <div class="entry-header">
                      <div class="post-thumb thumb"> 
                        <img src="/{{$new->photo}}" alt="" class="img-responsive img-fullwidth"> 
                      </div>                    
                      <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                        <ul>
                          <li class="font-16 text-white font-weight-600">{{$new->getdate()->format('d')}}</li>
                          <li class="font-12 text-white text-uppercase">{{$new->getdate()->format('F')}}</li>
                        </ul>
                      </div>
                    </div>
                    <div class="entry-content p-20 bg-white">
                      <div class="entry-meta media mt-0 mb-10">
                        <div class="media-body pl-0">
                          <div class="event-content pull-left flip">
                            <h3 class="entry-title text-white text-uppercase m-0 mt-5"><a href="/news/">{{$new->title}}</a></h3>
                            <span class="mb-10 text-gray-darkgray mr-10"><i class="fa fa-user-circle mr-5 text-theme-colored"></i>{{$new->publisher}}</span>
                            <span class="mb-10 text-gray-darkgray mr-10"><i class="fa fa-calendar-plus-o mr-5 text-theme-colored"></i>{{$new->published}}</span>
                          </div>
                        </div>
                      </div>
                      <p class="mt-5">{{substr($new->news,0,150)}}</p>
                      <a class="btn btn-theme-colored2 btn-sm text-white" href="/news/"> पुरा विवरण हेर्न </a>
                    </div>
                  </article>
                </div>
        @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('script1')

@endsection
@section('script2')
    <!-- Revolution Slider 5.x SCRIPTS -->
<script src="/assettheme1/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="/assettheme1/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<script src="/assettheme1/js/extra-rev-slider-new.js"></script>

<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>

<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>


<script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
@endsection