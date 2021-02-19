@extends('front.app')
@section('title',"Teacher")
@section('content')
<!-- <div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">{{$teacher->name}}</h1>
</div> -->
 <!-- Start main-content -->
 <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Teacher Detail </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home </a></li>
                <li class="active">pages </li>
                <li class="active"><a href="/faculty/{{$teacher->faculty()->id}}/">{{$teacher->faculty()->name}}</a> </li>
                <li class="active">{{$teacher->name}}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Experts Details -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-4">
              <div class="thumb">
                <img src="/{{$teacher->photo}}" alt="">
              </div>
            </div>
            <div class="col-md-8">
              <h4 class="name font-24 mt-0 mb-0">{{$teacher->name}}</h4>
              <h5 class="mt-5">{{$teacher->education}}</h5>
              <p>{{$teacher->description}}</p>
              <ul class="styled-icons icon-dark icon-theme-colored2 icon-sm mt-15 mb-0">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
             </ul>
            </div>
          </div>
          <div class="row mt-30">
            <div class="col-md-4">
              <h4 class="line-bottom-theme-colored-2">Details</h4>
              <div class="volunteer-address">
                <ul>
                  <li>
                    <div class="bg-light media border-bottom p-15 mb-20">
                      <div class="media-left">
                        <i class="fa fa-map-marker text-theme-colored2 font-24 mt-5"></i>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 mb-0">Address :</h5>
                        <p>{{$teacher->adress}}</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="bg-light media border-bottom p-15 mb-20">
                      <div class="media-left">
                        <i class="fa fa-phone text-theme-colored2 font-24 mt-5"></i>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 mb-0">Contact :</h5>
                        <p><span>Phone:</span> {{$teacher->phone}}<br><span>Email:</span> {{$teacher->email}}</p>
                      </div>
                    </div>
                  </li>
                  {{-- <li>
                    <div class="bg-light media border-bottom p-15">
                      <div class="media-left">
                        <i class="fa fa-download text-theme-colored2 font-24 mt-5"></i>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 mb-0">:</h5>
                        <a href="#" class="text-underline"><i class="fa fa-file-pdf-o mr-5"></i>Download PDF</a>
                      </div>
                    </div>
                  </li> --}}
                </ul>
              </div>
            </div>
         
            
            <div class="col-md-4">
              <div class="clearfix">
                <h4 class="line-bottom-theme-colored-2">Quick Contact:</h4>
              </div>
              <form id="contact-form" class="contact-form-transparent" action="/teacher/sendmail/" >
                <input type="hidden" name="teacher_id" value="{{$teacher->id}}" >
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="text" placeholder="Enter Name" id="contact_name" name="contact_name" required="" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" placeholder="Enter Email" id="contact_email" name="contact_email" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" placeholder="Enter Subject" id="contact_subject" name="contact_subject" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea rows="5" placeholder="Enter Message" id="contact_message" name="contact_message" required class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button data-loading-text="Please wait..." class="btn btn-flat btn-dark btn-theme-colored2 mt-5" type="submit">Send your message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->


    

@endsection