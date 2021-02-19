<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <div class="preloader-dot-loading">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Click Here</div>
    </div>

    <!-- Header -->
    <header id="header" class="header modern-header modern-header-theme-colored">
        <div class="header-top  sm-text-center" style="background:#234282;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget text-white">
                            <i class="fa fa-clock-o text-white"></i> Open Time : Sunday - Friday :
                            {{ env('time', '5am - 5pm') }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <ul class="list-inline  text-right flip sm-text-center" style="font-size:12px;">

                                <li>
                                    <a class="text-white" href="/result/page/">Results </a>
                                </li>
                                <li>
                                    <a class="text-white" href="/download/">Download</a>
                                </li>
                                <li>
                                    <a class="text-white" href="/login/">Student Login</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle p-0 bg-light xs-text-center">
            <div class="container pt-20 pb-20">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="widget sm-text-center">

                            <a href="mailto:admin@gmail.com" class="font-12 text-gray text-uppercase">Mail</a>
                            <h5 class="font-13 text-black m-0">
                                
                                samp.org.np@gmail.com
                            </h5>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6">
                        <div class="widget text-center" style="margin-top: 0%;">
                            <a href="/"><img src="/assets/img/ss.png" alt=""></a>
                            {{-- <h2 class="text-uppercase  mt-0">School Name</span></h2> --}}
                            <p>
                                Jahada, Sisawanijahada, Morang
                    
                           
                            </p>
                            {{-- <img class="mt-5 mb-20" alt="" src="/assets/img/lop.png">
                            --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="widget sm-text-center text-right">
                            <a href="tel:admin@gmail.com" class="font-12 text-gray text-uppercase">Call Us</a>
                            {{-- <i
                                class="fa fa-phone-square text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i> --}}
                            {{-- <a href="#" class="font-12 text-gray text-uppercase">अन्य
                                जानकारी को लागि सम्पर्क गर्नुहोस </a> --}}
                            <h5 class="font-13 text-black m-0"> 021-570760  </h5>
                            <h5 class="font-13 text-black m-0"> 9852022209  </h5>
                            {{-- <h5 class="font-13 text-black m-0"> 9800000000 Account </h5> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .header-nav-wrapper{
                transition: all 1s;
            }
            .header-top1{
                position: fixed !important;
                top:0px;
                left:0px;
                right:0px;
                margin: 0rem !important;
                background: #202C45;
            }
            
        </style>
        <div class="header-nav" >
            <div class="header-nav-wrapper navbascrolltofixed" id="header-nav">
                <div class="container">
                    <nav id="menuzord" class="menuzord green">
                        <ul class="menuzord-menu">
                            <li class="active"><a href="/">Home </a></li>
                            <li><a href="/notices/">Notice </a></li>
                            <li><a href="/news/">News </a></li>
                            <li>
                                <a href="#">Features </a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    @foreach (\Models\Page::where('type', feature)->get() as $item)
                                        <li><a href="/feature/{{ $item->id }}/">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">Courses </a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    @foreach (\Models\Page::where('type', course)->get() as $item)
                                        <li><a href="/course/{{ $item->id }}/">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">Faculties </a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    @foreach (\Models\Faculty::all() as $item)
                                        <li><a href="/faculty/{{ $item->id }}/">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="/galary/">Gallery </a></li>
                            <li><a href="/student/register/">Admission</a></li>
                            <li>
                                <a href="/aboutus/">About us</a>
                                <ul class="dropdown" style="right: auto; display: none;">
                                    <li><a href="/contact/">Contact </a></li>
                                    @foreach (\Models\Page::where('type', message)->get() as $item)
                                        <li><a href="/message/{{ $item->id }}/">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>


                        </ul>
                        {{-- --}}
                    </nav>
                </div>
            </div>
        </div>
    </header>
