@extends('front.app')
@section('title',"Login")
@section('content')
<style>
    .login{
        background-image:url(/asset/img/login.jpg);
        height:96.5vh;
        background-size:cover;
        h
    }
    .main{
        padding:3rem;
    }
    .cform{
        padding:0;
        border:1px solid #bbb;
    }
   .login .title{
        position: relative;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        margin-left:7.4rem;
        color:#fff;
        font-family:noticebody;
        font-weight:600;

    }
    .ilabel{
        font-weight:500;
    }
    * {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  margin: 100px auto;
  font-family: Raleway;
  padding: 0px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
input[type=radio]{
  width:auto;
}
/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
  background-color:
}

</style>
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Login</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Login</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
<div class="row main" >
                <div class="col-md-6 login">
                    <h3 class="title">Student Login</h3>
                </div>
                <div class="col-md-6 cform">
                  <form id="regForm" method="post" action="/panel/login/">
                    <!-- One "tab" for each step in the form: -->
                    {{-- <div class="tab">
                      <h1>Choose Your Option</h1>
                      <div style="padding:30px 0px;">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="role1" name="role" value="1" checked>
                          <label class="custom-control-label" for="role1" style="font-size:17px;">Teacher</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="role2" name="role" value="2" >
                          <label class="custom-control-label" for="role2" style="font-size:17px;">Parent</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="role3" name="role" value="3" >
                          <label class="custom-control-label" for="role3" style="font-size:17px;">Student</label>
                        </div>
                      </div>
                    </div> --}}
                    <div >
                      <h1>Student Login</h1>
                        <div class="form-group">
                            <label for="email" class="ilabel" >Email</label>
                            <input type="email" name="email" placeholder="Enter email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="ilabel">password</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control">
                        </div>
                      </div>
                      <input type="submit" class="btn btn-primary" value="Login">
                      {{-- <div style="overflow:auto;">
                        <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        </div>
                      </div> --}}
                      <!-- Circles which indicates the steps of the form: -->
                      {{-- <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                      </div> --}}
                    </form>
                  </div>
            </div>
</div>


@endsection
@section("script")
{{-- <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
 // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == 1) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  // Hide the current tab:
  // if you have reached the end of the form...
    currentTab = currentTab + n;
    x[currentTab-n].style.display = "none";
  if (currentTab >= x.length) {
    debugger;
    document.getElementById("regForm").submit();
    return false;
  }else{
    showTab(currentTab);
    debugger;

  }
  // Otherwise, display the correct tab:
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

window.addEventListener("load", function(){
  showTab(currentTab);
});
</script> --}}
@endsection