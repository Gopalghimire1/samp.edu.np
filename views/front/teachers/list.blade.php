@extends('front.app')
@section('title',"Teachers")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">{{$faculty->name}} Faculty </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home </a></li>
                <li class="active">Pages </li>
                <li class="active">{{$faculty->name}}  </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
 <!-- Section: teachers -->
 <section id="team">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="text-uppercase line-bottom-double-line-centered mt-0">{{$faculty->name}}   <span class="text-theme-colored2">Faculty </span></h2>
              <p><br></p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row mtli-row-clearfix">
            @foreach($teachers as $teacher)
            <div class="col-md-3 col-sm-12" style="margin-bottom:2rem;">
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
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
<!-- <div class="container ">
        <div class="row jumbotron" style="padding:4rem; 0">
                @foreach($teachers as $res)
                   <div class="col-sm-2 col-md-2">
                    <img src="/{{$res->photo}}"
                       alt="" class="img-rounded img-responsive" height="150px;" width="100%;"/>
                   </div>
                   <div class="col-sm-4 col-md-4">
                       <blockquote>
                         <p class="text-danger font-weight-bold" style="font-family:noticeheader;"><b>{{$res->name}}</b>
                        </p> <small class="text-info"><cite title="Source Title"> {{ $res->adress }} <i class="fas fa-map-marker-alt"> </i></cite></small>
                       </blockquote>
                       <p class="text-info" style="font-family:noticebody;"> <i class="fas fa-phone" ></i> {{$res->phone}}
                           <br />
                           <i class="fas fa-envelope-square"></i> {{$res->email}}
                           <br
                           /> <i class="fas fa-graduation-cap"></i>{{$res->education}}
                           
                       </p>
                   
                           <p class="customcursor" style="border-top: 2px #eeeeee solid;padding-top: 20px; padding-bottom:50px;height:200px;overflow-x: scroll;">
                                {{$res->description}}
                                   
                               </p>
                               <hr class="my-4">
                   </div>
                  
                   @endforeach
               </div>

              
</div>
@stop
@section('script')
<script>
    $(function() {  
    $(".customcursor").niceScroll({
    cursorcolor: "#424242", // change cursor color in hex
    cursoropacitymin: 0.2, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
    cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
    cursorwidth: "10px", // cursor width in pixel (you can also write "5px")
    cursorborder: "1px solid #fff"
    });

  
});
    </script> -->
@endsection