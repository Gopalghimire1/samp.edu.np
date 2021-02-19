@extends('front.app')
@section('title',"Admission")
@section('content')

<section class="inner-header divider layer-overlay overlay-theme-colored-7"  data-bg-img="/assets/img/bg2.jpg">
    <div class="container pt-120 pb-60">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row"> 
          <div class="col-md-6">
            <h2 class="text-white font-36">बिधार्थी भर्ना आबेदन </h2>
            <ol class="breadcrumb text-left mt-10 white">
              <li><a href="/">मूल पृष्ठ </a></li>
              <li class="active">पृष्ठ संग्रह </li>
              <li class="active">बिधार्थी भर्ना आबेदन</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
 <div class="container" >
     <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
   
    <div class="col-md-8">
        <?php 
            if(isset($_SESSION['message'])){
                echo "<div style='height:30px; background:green;'>";
                echo "<p class='text-white'>".$_SESSION['message']."</p>";
                echo "</div>";
            }
        ?>

        <?php
            unset($_SESSION['message']);
        ?>
            <p class="text-center h4 mb-4" style="margin-top:1px; font-family:noticeheader;font-weight:700; ">आबेदन पठाउनुहोस </p>
            <form method="post" style="margin-top:1rem;">
                <div class="row">
                    <div class="col-md-6">            
                        <div class="form-group">
                            <label style="font-weight:bold;">पुरा नाम  :</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter first name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                            <label style="font-weight:bold;">ठेगाना  :</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter last name" required>
                        </div>
                    </div>
                

                <div class="form-group">
                    <label style="font-weight:bold;">बुबाको नाम </label>
                    <input type="text" name="parent" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label style="font-weight:bold;">आमाको नाम </label>
                    <input type="text" name="parent1" class="form-control" placeholder="Enter email" required>
                </div>
                

                <div class="form-group">
                    <label style="font-weight:bold;">सम्पर्क न  :</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">आगिल्लो बिधालय  :</label>
                    <input type="text" name="preschool" class="form-control"  required>
                </div>
                
                <div class="form-group">
                    <label style="font-weight:bold;">माध्यम </label>
                   <select name="medium" class="form-control" required>
                       <option value="">==== माध्यम छान्नुहोस ====</option>
                       <option value="1">अंग्रेजी </option>
                       <option value="2">नेपाली  </option>
            
                   </select>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">भर्ना हुन चाहेको कक्षा </label>
                   <select name="class" class="form-control" required>
                       <option value="">==== कक्षा छान्नुहोस ====</option>
                       <option value="1">१ </option>
                       <option value="2">२  </option>
                       <option value="3">३ </option>
                       <option value="4">४ </option>
                       <option value="5">५ </option>
                       <option value="6">६</option>
                       <option value="7">७ </option>
                       <option value="8">८ </option>
                       <option value="9">९ </option>
                       <option value="10">१० </option>
                       <option value="11">११ </option>
                       <option value="12">१२ </option>
                       <option value="12">बालि बिज्ञान </option>
                   </select>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">गणित को प्रप्तांक :</label>
                    <input type="number" name="math" class="form-control" placeholder="Enter math marks" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">बिज्ञान को प्रप्तांक :</label>
                    <input type="number" name="science" class="form-control" placeholder="Enter math marks" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;">अंग्रेजी को प्रप्तांक :</label>
                    <input type="number" name="engilsh" class="form-control" placeholder="Enter math marks" required>
                </div>

                <div class="form-group">
                    <label style="font-weight:bold;"> सूचना  :</label>
                    <textarea name="detail" id="" cols="20" rows="5" class="form-control" placeholder="Enter your message" ></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">आबेदन पठाउनुहोस </button>
                </div>
                </div>
            </form>
    </div>
 </div>
 </div>

@stop