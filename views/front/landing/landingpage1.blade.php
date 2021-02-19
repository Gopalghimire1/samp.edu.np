@extends('front.app')
@section('title', 'HOME')
@section('content')
    @include('front.landing.intro')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>

        li.nav-item.active>a {


            background: #202C45;
            font-weight: 600;
            color: White !important;
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            border: none;
            border-radius: 3px;
        }


        li.nav-item>a {
            font-size: 15px;
            border: none;
        }

        .nav-tabs>li.active a {
            background: #202C45;

        }


        .nav-tabs>li.active a:focus {
            background: #202C45;
            border: none;
        }

        .nav-tabs>li.active a:hover {
            background: #202C45;
            border: none;
        }

        li.nav-item>a {
            padding: 2rem 3rem;
            background: transparent;

        }

        li.nav-item>a:hover {
            transform: scale(1.1);
            background: #202C45;
            font-weight: 600;
            color: White !important;
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            border: none;
            border-radius: 3px;
        }

    </style>
    <div style="background:#F7F8FA;">
        <!-- Section: home-boxed -->
        <div class="container">
            <div style="padding: 3rem 0.5rem;">
                <div class="row">
                    <div class="col-md-9">
                        <section>
        
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#Notices" role="tab"
                                        aria-controls="home" aria-selected="true">
                                        <div>
        
                                            Latest Notice
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">
                                        <div>
                                          Latest News
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div>
        
                                        Results
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#admission" role="tab"
                                        aria-controls="contact" aria-selected="false">
                                        <div>
        
                                        Admission
                                        </div>
                                    </a>
                                </li>

                                
                            </ul>

                            <style>
                                .notice-list{
                                  list-style-type: none;
                                  border-top: 1px solid #ccc;
                                  border-bottom: 1px solid #ccc;
                                  border-right: 1px solid #ccc;
                                  height: 54px;
                                  margin-bottom: 1rem;
                                }
                                .s-n{
                                  background: #e9e8e8;
                                  position: absolute;
                                  line-height: 1;
                                  font-size: 18px;
                                  font-weight: 500;
                                  text-align: center;
                                  width: 60px;
                                  padding: 17px;
                                }
                                
                                .notice-text{
                                  padding: 9px;
                                  line-height: 1;
                                  font-weight: 500;
                                  white-space: nowrap;
                                  overflow: hidden;
                                  text-overflow: ellipsis;
                                  transition: transform .2s;
                                  margin-left: 4rem;
                                  color: #0056b3;
                      
                                }
                                .notice-text:hover{
                                  color: rgb(117, 117, 248);
                                  text-decoration: underline;
                                  transform: scale(1.0)
                                }
                                .date{
                                  font-size: 13px;
                                  text-align: end;
                                  margin-top: 5px;
                                  color: black;
                                  font-weight: 700;
                                }
                      
                                @media only screen and (max-width: 768px){
                                  .notice-text>a{
                                    margin-left: 1rem;
                                  }
                                }
                                
                            </style>
                            <div class="tab-content" id="myTabContent" style="    box-shadow: 0px 0px 10px 0px black;margin-top: 0.5rem;">
                                <div class="tab-pane  active" id="Notices" role="tabpanel" aria-labelledby="home-tab">
                                   
                                    @if (\Models\Notice::count()==0)
                                    <img src="/assets/img/no/notice.png" alt="" srcset="" style="width:100%;">
                                        
                                    @else
                                        <div class="row">

                                        <div class="col-md-12 col-sm-12 h-100">
                                            <h3 class="mb-4">Latest Notice</h3>
                                            <ul class="p-0">
                                                @foreach (\Models\Notice::orderBy('created_at', 'desc')->take(5)->get(); as $k => $notice)
                                  
                                                  <li class="notice-list">
                                                     <span class="s-n">
                                                        {{ $notice->getdate()->format('d') }}
                                                     </span>
                                                    <div class="notice-text">
                                                      <a href="/notice/single/{{$notice->id}}/">{{ $notice->title }}</a>
                                                        <div class="date">
                                                          {{ $notice->published }}
                                                        </div>
                                                    </div>
                                                  </li>
                                                  @endforeach
                                                  
                                              </ul>
                                        </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="/notices/"class="btn btn-secondary btn-lg" style="background: #202C45">View all Notices</a>
                                        </div>
                                    @endif
                                    
        
                                </div>
                                <div class="tab-pane " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @if(\Models\News::count()==0)
                                        <img src="/assets/img/no/news.png" alt="" srcset="" style="width:100%;">
                                    @else
                                        <div class="row row-eq-height">

                                            <div class="col-md-12 col-sm-12 h-100">
                                                <h3 class="mb-4">Latest Notice</h3>
                                                <ul class="p-0">
                                                    @foreach (\Models\News::orderBy('created_at', 'desc')->take(4)->get(); as $new)
                                      
                                                      <li class="notice-list">
                                                         <span class="s-n">
                                                            {{ $notice->getdate()->format('d') }}
                                                         </span>
                                                        <div class="notice-text">
                                                          <a href="/notice/single/{{$notice->id}}/">{{ $notice->title }}</a>
                                                            <div class="date">
                                                              {{ $notice->published }}
                                                            </div>
                                                        </div>
                                                      </li>
                                                      @endforeach
                                                      
                                                  </ul>
                                            </div>


                                            @foreach (\Models\News::orderBy('created_at', 'desc')->take(4)->get(); as $new)
                                                <div class="col-md-6 h-100">
                                                    <article class="post clearfix campaign mb-30">
                                                        <div class="entry-header">
                                                            <div class="post-thumb thumb" style="max-height:295px;overflow:hidden;">
                                                                <a href="/news/{{$new->id}}/"><img src="/{{ $new->photo }}" alt="" class="img-responsive img-fullwidth" ></a>
                                                            </div>
                                                            <div
                                                                class="entry-date media-left text-center flip bg-theme-colored p-3">
                                                                <ul>
                                                                    <li class="font-16 text-white font-weight-600">
                                                                        {{ $new->getdate()->format('d') }}</li>
                                                                    <li class="font-12 text-white text-uppercase">{{ $new->getdate()->format('F') }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="entry-content p-20 bg-white">
                                                            <div class="entry-meta media mt-0 mb-10">
                                                                <div class="media-body pl-0">
                                                                    <div class="event-content pull-left flip">
                                                                        <h3 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                                                href="/news/{{$new->id}}/">{{ $new->title }} </a></h3>
                                                                        <span class="mb-10 text-gray-darkgray mr-10"><i
                                                                                class="fa fa-user-circle mr-1 text-theme-colored"></i>{{ $new->publisher }}</span>
                                                                                <br>
                                                                        <span class="mb-10 text-gray-darkgray mr-10"><i
                                                                                class="fa fa-calendar-plus-o mr-1 text-theme-colored"></i>{{ $new->published }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mt-5"></p>
                                                           
                                                        </div>
                                                    </article>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            <a href="/news/"class="btn btn-secondary btn-lg" style="background: #202C45">View all News</a>
                                        </div>
                                    @endif
                                    
                                </div>
                                <div class="tab-pane " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        @if (\Models\Rresult::count() ==  0)
                                         <img src="/assets/img/no/result.png" alt="" srcset="" style="width:100%;">
                                        @else
                                        @foreach (\Models\Rresult::latest()->get() as $result)
                                        <div class="col-md-12 col-sm-12 h-100">
                                            <div class="shadow p-3">
                                                <h4 style="font-family: 'Roboto'; font-size: 16px;"><a
                                                    href="/result/detail/{{$result->id}}/">{{ $result->title }} </a>
                                                </h4>
                                            </div>
                                            <hr>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane " id="admission" role="tabpanel" aria-labelledby="contact-tab">
                                    @foreach (\Models\Openadmission::where('enabled',1)->orderBy('created_at', 'desc')->take(5)->get(); as $notice)        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="feature-wrapper " style="margin: 0 0 10px 0;padding:10px 30px 10px 30px;">
                                                <div class="feature-title-heading">
                                                    <h3>
                                                        <span>
                                                            {{ $notice->title }} 
                                                        </span>
                                                    </h3>
                                                    <span></span>
                                                </div>
                                                <div class="feature-text">
                                                    <p>{{ $notice->message }}</p>
                                                </div>
                                               
                                              
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div>
                                        <a href="/student/register/" class="btn btn-primary">Register For New Student</a>
                                        <a href="/login/" class="btn btn-secondary">Login for Registered Student</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="col-md-3">

                        @foreach (\Models\Member::take(3)->get() as $member)
                            <div class="shadow" >
                                <img class="img-fullwidth" src="\assets\img\page\{{$member->image}}">
                                <div class="card-title p-1 text-center">
                                    <h4>{{$member->desig}} </h4>
                                    <h6>{{$member->name}} </h6>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="events" style="background: #F6F6F6;">
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-md-6">
                <h2 class="line-bottom mt-0"><i class="fa fa-calendar mr-10"></i> <span class="text-theme-colored2">Events</span></h2>
                @foreach (  Models\Event::orderBy('id', 'desc')->take(3)->get() as $event)
                    
                <div class="event media sm-maxwidth400 border-bottom mt-5 mb-0 pt-10 pb-15">
                  <div class="row">
                    <div class="col-xs-2 col-md-3 pr-0">
                      <div class="event-date text-center bg-theme-colored border-1px p-2 sm-custom-style">
                        <ul>
                          <li class="font-18 text-white font-weight-700">{{$event->getdate()->format('F')}}</li>
                          <li class="font-16 text-white text-center text-uppercase"> {{$event->getdate()->format('d')}}</li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-xs-9 pr-10 pl-10">
                      <div class="event-content mt-0 p-0 pb-0 pt-0">
                        <h4 class="media-heading font-weight-600"><a href="/">{{$event->title}}</a></h4>
                        <p class="mb-0">
                            {{$event->description}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
               <?php
            $video=\Models\Video::first();
            $link='';
            $image='';
            if($video!=null){
                $link=$video->link;
                $image=$video->image;
            }
       ?>
              <div class="col-md-6">
                <h2 class="line-bottom mt-0">College <span class="text-theme-colored2">Video</span></h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-hover-effect play-button">
                      <div class="effect-wrapper">
                        <div class="thumb">
                          <img class="img-fullwidth" src="{{$image!=""?"/assets/img/page/".$image:"\assets\img\student\1600092479_projectimage.jpg"}}" alt="project">
                        </div>
                        <div class="overlay-shade bg-theme-colored"></div>
                        <div class="video-button"></div>
                        <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{$link==""?"#":$link}}" title="Youtube Video">Youtube Video</a>
                      </div>
                    </div>             
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </section>
      
      
      <?php
        $popup=\Models\Popup::where('status',1)->first();
      ?>
      @if($popup!=null)
         <div class="modal show" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 9998;">
        <div class="modal-dialog modal-dialog-centered  " role="document">
            <div class="modal-content"
                style="background:url('/assets/img/page/{{$popup->image}}');
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
                position:relative;">
                <div style="
                     position:relative;
                    min-height:98vh;
                    width:100%;
                    text-align:center;
                    color:white;
                    background:transparent;
                    padding:320px 0px 20px 0px;">
                    <h3 style="
                    color:white;
                    font-weight:bold;
                    font-family: 'Nunito', sans-serif;
                     text-shadow:
                        0 0 5px #fff,
                        0 0 10px #fff,
                        0 0 20px #fff,
                        0 0 40px #0ff,
                        0 0 80px #0ff,
                       ;
                    ">
                        <!--{!! $popup->body !!}-->
                    <!--<div class="p-1">-->
                    <!--    <button onclick="window.location.assign('https://arniko.susankya.com.np/payment/online-form/')" class="btn btn-primary">Click Here to-->
                    <!--        Register</button>-->
                    <!--</div>-->

                    <button style="position: absolute;right:10px;top:10px;color:black;text-shadow: 0px 0px 20px rgba(0,0,0,0.59);" type="button" class="close"
                        data-dismiss="modal" aria-label="Close" onclick="$( 'body').css('padding','0px');$( 'body').removeClass( 'modal-open' );$('.modal-backdrop').remove();$('#exampleModalCenter').remove();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


            </div>
        </div>
    </div>
      @endif
@endsection
@section('script1')

@endsection
@section('script2')
    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="/assettheme1/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assettheme1/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/assettheme1/js/extra-rev-slider-new.js"></script>

    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
                                  (Load Extensions only on Local File Systems ! 
                                   The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>

    <script type="text/javascript"
        src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>


    <script type="text/javascript" src="/assettheme1/js/revolution-slider/js/extensions/revolution.extension.video.min.js">
    </script>
    <script>
         $(window).on('load',function(){
            var delayMs = 1500; // delay in milliseconds
        
            setTimeout(function(){
                $('#exampleModalCenter').modal('show');
            }, delayMs);
         });
    </script>
@endsection
