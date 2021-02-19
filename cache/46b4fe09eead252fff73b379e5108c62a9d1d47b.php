<?php $__env->startSection('title',"Login"); ?>
<?php $__env->startSection('content'); ?>
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
                      
                      <!-- Circles which indicates the steps of the form: -->
                      
                    </form>
                  </div>
            </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>