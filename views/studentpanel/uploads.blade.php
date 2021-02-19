@extends('front.app')
@section('title', 'Panel')
@section('content')
    <style>
        .shadow {
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);

            border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border: 0px solid #a89a9a;
        }

    </style>
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">Student Panel</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home</a></li>
                            <li class="active">Pages</li>
                            <li class="active">Panel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
       
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3" style="padding:5px;">
                @include('studentpanel.menu')
            </div>
            <div class="col-md-8">
                 <div>
            @include('studentpanel.alert')
        </div>
        <br>
                <div>
                    <a href="/student/academics/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Academic Record</a>
                    <a href="/student/uploads/" class="btn btn-success">Document Uploads</a>
                    @if (\Models\Studentupload::where('student_id', $student->id)->count() > 0) 
                            <a href="/student/admission/" class="btn btn-primary">
                                Proceed to Admission Form <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a> 
                    @endif 
                </div>
                <br>
                <div class="shadow" style="padding:1rem; margin-bottom:3rem;">

                    <div>
                        <h1 class="text-left">
                            Uploads Your Documents
                        </h1>
                        <hr>
                    </div>
                    <div class="" style="padding:1rem;margin-bottom: 2rem;">
                        <form action="/student/upload/add/" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Document Title</label>
                                        <select name="title" id="title" class="form-control" required>
                                            <option value="SLC/SEE - marksheet">
                                                SLC/SEE - marksheet
                                            </option>
                                            <option value="SLC/SEE - Character Certificate">
                                                SLC/SEE - Character Certificate
                                            </option>
                                            <option value="SLC/SEE - migration">
                                                SLC/SEE - migration for other Board
                                            </option>
                                             <option value="Citizenship">
                                                Citizenship
                                            </option>
                                            <option value="Other">
                                                Other - Enter Document Type in remarks
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Verified By</label>
                                        <input type="text" name="verified_by" id="verified_by" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Verifier Phone no</label>
                                        <input type="text" name="verified_phone" id="verified_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-left">
                                        <label class="text-left">Remarks</label>
                                        <textarea rows="12" type="text" name="remark" id="remark"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Scan/Photo of Document
                                        <span style="font-size: 14px;color:#9C9C9C;"> * (Image Size should below 1mb )
                                        </span>
                                    </label>
                                    <div style="position: relative">
                                        <div>
                                            <input onchange="loadImage(this)" style="display:none;" name="image" type="file"
                                                id="gal" accept="image/*" required />
                                            <img src="/asset/img/add_image.png" alt="..." id="gal_img"
                                                onclick="document.getElementById('gal').click();">
                                        </div>
                                        <div style="position: absolute;top:0px;right:0px;">
                                            <span class="btn btn-danger" onclick="
                                                                            document.getElementById('gal').value = null;
                                                                            document.getElementById('gal_img').src='/asset/img/add_image.png';
                                                                            ">Clear</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group text-left">
                                    <input type="submit" value="Add Record" class="btn btn-primary">
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
           <br>
                <div>
                    @foreach ($student->uploads() as $item)

                        <div class="row" style="margin:2rem 0rem;">
                            <div class="col-md-4">
                                <img src="/assets/img/student/{{ $item->file }}" style="width:100%">
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $item->title }}</h4>
                                <br>
                                <p> <strong>Verified By:</strong>{{ $item->verified_by }} </p>
                                <p> <strong>Remarks:</strong>{{ $item->remark }} </p>
                                <p>
                                    <a href="/student/upload/del/{{ $item->id }}/" class="btn btn-danger">Delete</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>



            </div>
        </div>
    </div>

    @include('studentpanel.edit')
    @include('studentpanel.changepass')



@endsection
@section('script')
    <script>
        function loadImage(input) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#gal_img').attr('src', e.target.result);
                }
                var FileSize = input.files[0].size / 1024;
                if (FileSize > 3072) {
                    alert('Image Size Cannot Be Greater than 3mb');
                    document.getElementById('gal_img').src = '/asset/img/add_image.png';
                    input.value = null;
                    console.log(input.files);
                } else {

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        }

    </script>
@endsection
