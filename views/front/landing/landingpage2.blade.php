@extends('front.app1')
@section('title', 'HOME')
@section('content')
    @include('front.landing.intro')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/asset/css/landingpage2.css" crossorigin="anonymous">
   

    <div class="section">
        <div class="first-container">
            <div class="container c-1">
                    <div class="row">
                        <div class="col-md-3 pt-4 pt-md-0">
                            <div class="quicklinks">
                                <div class="title">
                                    Quick Links
                                </div>
                                <div class="links">
                                    <ul class="p-0">
                                        <li>
                                            <a href="/message/24/">Message form chairperson</a>
                                        </li>
                                        <li>
                                            <a href="/message/25/">Message form principal</a>
                                        </li>
                                        <li>
                                            <a href="/message/26/">What is KPKSG</a>
                                        </li>
                                        <li>
                                            <a href="/message/27/">What is SAMP</a>
                                        </li>
                                        <li>
                                            <a href="/news/">Latest News</a>
                                        </li>
                                        <li>
                                            <a href="/notices/">Latest Notice</a>
                                        </li>
                                        <li>
                                            <a href="/aboutus/">Know about us</a>
                                        </li>
                                        <li>
                                            <a href="/student/register/">Click for Admission</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4 pt-md-0">
                            <div class="min-about">
                                <h1 class="text-center text-white pb-4">
                                    Welcome To Collage
                                </h1>
                                <p class="pb-4">
                                    
                                </p>
                                <div class="text-center">
                                    <a href="/aboutus/" class="btn btn-about">About Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pt-md-0">
                            @foreach (\Models\Member::take(4)->get() as $member)
                                <div class="" >
                                    <div class="row member" >
                                        <div class="col-3 col-md-4 pr-0">
                                            <img class="w-100" src="\assets\img\page\{{$member->image}}">
                                        </div>
                                        <div class="col-9 col-md-8 pl-0">
                                            <div class="name">{{$member->name}}</div>
                                            <div class="desig">
                                                {{$member->desig}}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                       
                    </div>
                    {{-- <hr> --}}
                    {{-- <div class="cta">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus enim at exercitationem, error velit ipsum reprehenderit ipsam repellendus incidunt voluptatem deleniti repellat nobis impedit quae. Repudiandae accusantium sapiente molestias error!
                    </div> --}}
                    <div class="courses ">
                        <div class="title">
                            Our Courses
                        </div>
                        <div class="course-list">
                            <div class="row">
                                <div class="col-md-8 " style="position:relative;">
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach (\Models\Page::where('type', course)->get() as $item)
                                        <div class="course cc_{{$item->id}} {{$i==0?'active':''}}">
                                            <img src="/assets/img/page/{{$item->image}}" alt="">
                                        </div>
                                        @php
                                            $i+=1;
                                        @endphp
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach (\Models\Page::where('type', course)->get() as $item)
                                        <div class="coursetitle cc_{{$item->id}} {{$i==0?'active':''}}" onclick="showcc({{$item->id}});">
                                            {{$item->title}}
                                        </div>
                                        @php
                                            $i+=1;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-8">
                            <div class="card shadow p-0">
                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#Notices" role="tab"
                                            aria-controls="home" aria-selected="true">
                                            <div>
                                                Latest Notice
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#resuts" role="tab"
                                            aria-controls="home" aria-selected="true">
                                            <div>
                                                Results
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <style>
                                    
                          
                                    @media only screen and (max-width: 768px){
                                      .notice-text>a{
                                        margin-left: 1rem;
                                      }
                                    }
                                    
                                </style>
                                <div class="tab-content" id="myTabContent" >
                                    <div class="tab-pane  active" id="Notices" role="tabpanel" aria-labelledby="home-tab">
                                    
                                        @if (\Models\Notice::count()==0)
                                        <img src="/assets/img/no/notice.png" alt="" srcset="" style="width:100%;">
                                            
                                        @else
                                            <div class="row">

                                            <div class="col-md-12 col-sm-12 h-100">
                                                @php
                                                    $sn=1;
                                                @endphp
                                                <ul class="p-0">
                                                    @foreach (\Models\Notice::orderBy('created_at', 'desc')->take(5)->get(); as $k => $notice)
                                    
                                                    <li class="notice-list">
                                                        <span class="s-n">
                                                            {{ $sn++ }}
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
                                                <a href="/notices/"class="btn btn-secondary " style="background: #202C45">View all Notices</a>
                                            </div>
                                        @endif
                                        
            
                                    </div>
                                
                                    <div class="tab-pane " id="resuts" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            @if (\Models\Rresult::count() ==  0)
                                            <img src="/assets/img/no/result.png" alt="" srcset="" style="width:100%;">
                                            @else
                                            @foreach (\Models\Rresult::latest()->get() as $result)
                                            <div class="col-md-12 col-sm-12 h-100">
                                                <div class="p-1">
                                                    <h4 style="font-family: 'Roboto'; font-size: 18px;font-weight:500; display:flex;justify-content: space-between;"><a
                                                        href="/result/detail/{{$result->id}}/">{{ $result->title }} </a>
                                                        <span style="float: right;">
                                                            <a href="/result/detail/{{$result->id}}/" style="font-size: 14px;">View Detail</a>
                                                        </span>
                                                    </h4>
                                                </div>
                                                
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if(\Models\News::count()==0)
                                        <img src="/assets/img/no/news.png" alt="" srcset="" style="width:100%;">
                                    @else
                                        <div class="row row-eq-height">

                                            {{-- <div class="col-md-12 col-sm-12 h-100">
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
                                            </div> --}}


                                            @foreach (\Models\News::orderBy('created_at', 'desc')->take(8)->get(); as $new)
                                                {{-- <div class="col-md-6 h-100">
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
                                                </div> --}}
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <div class="post-thumb thumb" style="max-height:75px;overflow:hidden;border-radius:5px;">
                                                            <img src="/{{ $new->photo }}" alt="" class="w-100" >
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <h6 class="entry-title text-white text-uppercase m-0 "><a
                                                            href="/news/{{$new->id}}/">{{ $new->title }} </a></h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            <a href="/news/"class="btn btn-secondary " style="background: #202C45">View all News</a>
                                        </div>
                                    @endif
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-4 ">
                            <div class="shadow minisection">
                                <div class="minisection-title">
                                        Events
                                </div>
                                <div class="events">
                                    <ul>
                                        @foreach (\Models\Event::latest()->get() as $event)
                                            <li class="event">
                                                <div class="event-title">
                                                    {{ $event->title }}
                                                </div>
                                                <div>
                                                    {{ $event->eventdate }}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="shadow minisection">
                                <div class="minisection-title">
                                        Important Links
                                </div>
                                <div class="imp-link">
                                    <div class="links">
                                        <ul class="p-0">
                                            <li>
                                                <a href="/message/24/">Message form chairperson</a>
                                            </li>
                                            <li>
                                                <a href="/message/25/">Message form principal</a>
                                            </li>
                                            <li>
                                                <a href="/message/26/">What is KPKSG</a>
                                            </li>
                                            <li>
                                                <a href="/message/27/">What is SAMP</a>
                                            </li>
                                            <li>
                                                <a href="/news/">Latest News</a>
                                            </li>
                                            <li>
                                                <a href="/notices/">Latest Notice</a>
                                            </li>
                                            <li>
                                                <a href="/aboutus/">Know about us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="shadow minisection">
                                <div class="minisection-title">
                                        Latest News
                                </div>
                                <div class="imp-link">
                                    <div class="links">
                                        <ul class="p-0">
                                            @foreach (\Models\News::orderBy('created_at', 'desc')->take(8)->get(); as $new)
                                            <li>
                                                <a href="/news/{{$new->id}}/">{{ $new->title }} </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            @include('front.footer')
        </div>
      
    </div>
    <div class="clearfix"></div>
@endsection
@section('script1')
    <script>
        document.addEventListener('scroll', function(e) {
            lastKnownScrollPosition = window.scrollY;
            console.log(lastKnownScrollPosition);
            if(lastKnownScrollPosition>200){
                $('#header-nav').addClass('header-top1');
            }else{
                $('#header-nav').removeClass('header-top1');

            }
        });
        function showcc(id){
            $('.course').removeClass('active');
            $('.coursetitle').removeClass('active');
            $('.cc_'+id).addClass('active');
        }
    </script>
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
