@extends('front.app')
@section('title',"About")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Contact Us </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home </a></li>
                <li class="active">Pages </li>
                <li class="active">Contact </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

<div class="container">
   
        <div class="row" style="margin-top:2px; margin-bottom:2rem;">
            <div class=" contact col-md-6">
            <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d28571.726189529716!2d87.35368972240518!3d26.45055783376116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sSailaja%20Acharya%20Memorial%20Polytechnic%2C%20Biratnagar!5e0!3m2!1sen!2snp!4v1600336002024!5m2!1sen!2snp" width="400" height="700" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                
            </div>
            <div>
            </div>
            </div>
            <div class="col-md-6" style="padding:3rem;">
                    
            <p class="text-center h4 mb-4" style="margin-top:1px; font-family:noticeheader;font-weight:700; ">हामीलाई सूचना गर्नुहोस </p>

            <form method="post" style="margin-top:1rem;" action='/contactus/'>
                <div class="row">
                    <div class="col-md-6">            
                        <div class="form-group">
                            <label style="font-weight:bold;">नाम :</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter first name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                            <label style="font-weight:bold;">थर :</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter last name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">ठेगाना  :</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter adderss" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">इमेल  :</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">मोबाइल न  :</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">तपाइको सूचना  :</label>
                    <textarea name="message" id="" cols="20" rows="5" class="form-control" placeholder="Enter your message" required></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">पठाउनुहोस </button>
                </div>
            </form>
            </div>
        </div>

</div>

@endsection