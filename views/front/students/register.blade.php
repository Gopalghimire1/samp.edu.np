@extends('front.app')
@section('title', 'Register Student')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/nepali-date-picker@2.0.1/dist/nepaliDatePicker.min.css"
        crossorigin="anonymous" />
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

        .nepali-date-picker .drop-down-content {
            min-width: 100px !important;
            min-height: 200px !important;
        }

        .drop-down-content li {
            padding-right: 5px;
        }

    </style>
@endsection
@section('content')
    @php
    $district = [
    "Bhojpur",
    "Dhankuta",
    "Ilam",
    "Jhapa",
    "Khotang",
    "Morang",
    "Okhaldhunga",
    "Panchthar",
    "Sankhuwasabha",
    "Solukhumbu",
    "Sunsari",
    "Taplejung",
    "Tehrathum",
    "Udayapur",
    "Bara",
    "Dhanusa",
    "Mahottari",
    "Parsa",
    "Rautahat",
    "Saptari",
    "Sarlahi",
    "Siraha",
    "Bhaktapur",
    "Chitwan",
    "Dhading",
    "Dolakha",
    "Kathmandu",
    "Kavrepalanchowk",
    "Lalitpur",
    "Makwanpur",
    "Nuwakot",
    "Ramechhap",
    "Rasuwa",
    "Sindhuli",
    "Sindhupalchok",
    "Baglung",
    "Gorkha",
    "Kaski",
    "Lamjung",
    "Manang",
    "Mustang",
    "Myagdi",
    "Nawalpur",
    "Parbat",
    "Syangja",
    "Tanahu",
    "Arghakhanchi",
    "Banke",
    "Bardiya",
    "Dang",
    "Eastern Rukum",
    "Gulmi",
    "Kapilvastu",
    "Palpa",
    "Parasi",
    "Pyuthan",
    "Rolpa",
    "Rupandehi",
    "Dailekh",
    "Dolpa",
    "Humla",
    "Jajarkot",
    "Jumla",
    "Kalikot",
    "Mugu",
    "Salyan",
    "Surkhet",
    "Western Rukum",
    "Achham",
    "Baitadi",
    "Bajhang",
    "Bajura",
    "Dadeldhura",
    "Darchula",
    "Doti",
    "Kailali",
    "Kanchanpur",
    ];

    @endphp
    @endphp
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" ddata-bg-img="/assets/img/bg2.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">Register Student</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home</a></li>
                            <li class="active">Pages</li>
                            <li class="active">Register Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <form action="/student/save/" method="post" enctype="multipart/form-data">

            @if (isset($error))
                <div>
                    @foreach ($error as $item)
                    <div class="alert alert-danger" role="alert">
                        {{$item}}
                      </div>
                    @endforeach
                </div>
            @endif
            <div class=" shadow" style="padding: 2rem;margin: 3rem 0;">
                <div class="card-title text-left">
                    <a name="somelink"></a>
                    <h2>General Information</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
                        <div class="col-md-6" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Full Name (In Devnagari) </label>
                                <input type="text" name="name_dev" class="form-control"
                                    placeholder="Enter Name in Devnagari" />
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Date of Birth (BS) * </label>
                                <input type="text" name="dob_bs" id="dob_bs" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Date of Birth (AD) </label>
                                <input type="date" name="dob_ad" id="dob_ad" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Father's Name </label>
                                <input type="text" name="fathername" class="form-control"
                                    placeholder="Enter Father's Name" />
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Mother's name </label>
                                <input type="text" name="mothername" class="form-control"
                                    placeholder="Enter Mother's Name" />
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Religion* </label>
                                <input type="text" name="religion" class="form-control" placeholder="Enter Religion"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Caste* </label>
                                <input type="text" name="caste" class="form-control" placeholder="Enter Caste" required />
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 1rem;">
                            <div class="form-group">
                                <label style="font-weight:bold;">Gender* </label>
                                <select name="gender" class="form-control">
                                    <option></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class=" shadow" style="padding: 2rem;margin: 3rem 0;">
                <div class="card-title text-left">
                    <h2>Permanent address / Contact Info</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight:bold;">Province* </label>

                                <select name="province" id="province" class="form-control" required>
                                    <option></option>
                                    <option value="Province No 1">Province No 1</option>
                                    <option value="Province No 2">Province No 2</option>
                                    <option value="Bagmati Pradesh">Bagmati Pradesh</option>
                                    <option value="Gandaki Pradesh">Gandaki Pradesh</option>
                                    <option value="Province No 5">Province No </option>
                                    <option value="Karnali Pradesh">Karnali Pradesh</option>
                                    <option value="Sudurpashchim Pradesh">Sudurpashchim Pradesh</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight:bold;">District* </label>

                                <select name="district" id="district" class="form-control" required>
                                    <option></option>
                                    @foreach ($district as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight:bold;">Municipality* </label>

                                <select name="mun" id="mun" class="form-control" required>
                                    <option></option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label style="font-weight:bold;">Ward No* </label>

                                <input type="text" name="wardno" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight:bold;">Contact no* </label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Cantact no"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-weight:bold;">Email* </label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" shadow" style="padding: 2rem;margin: 3rem 0;">
                <div class="card-title text-left">
                    <h2>PP Photo <span style="font-size: 14px;color:#9C9C9C;"> * (Image Dimension should be (35mm x 45mm)
                            (or similar ratio) and below 600kb )</span></h2>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 " style="min-height:180px;">
                            <div style="position: relative">
                                <div>
                                    <input onchange="loadImage(this)" style="display:none;" name="image" type="file"
                                        id="gal" accept="image/*" required/>
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
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
            <div class=" shadow" style="padding: 2rem;margin: 3rem 0;">
                <div class="card-title text-left">
                    <h2>Account</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label style="font-weight:bold;">Password* </label>
                                <input type="password" name="password" class="form-control" required />
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label style="font-weight:bold;">Retype Password* </label>
                                <input type="password" name="repassword" class="form-control" required />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class=" shadow" style="padding: 2rem;margin: 3rem 0;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label style="font-weight:bold;">Please enter  <img src="/captcha/" /> in box shown below</label>
                                <input type="text" name="captcha" class="form-control" required placeholder="Enter Captcha"/>
                               
                            </div>

                        </div>

                        <div class="col-md-6">
                            <br>
                            <div class="form-group">
                                <input type="submit" value="Proceed To Next Step" class="btn btn-primary">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="/asset/js/nepinfo.js"></script>
    <script src="https://unpkg.com/nepali-date-picker@2.0.1/dist/jquery.nepaliDatePicker.min.js" crossorigin="anonymous">
    </script>

    <script>
        function ad(date) {
            m=parseInt(date.getMonth()) + 1;
            mm=""+m;
            if(m<10){
                mm="0"+m;
            }

            d=date.getDate();
            dd=""+d;
            if(d<10){
                dd="0"+d;
            }
            return date.getFullYear()+"-" +  mm +"-" + dd  ;
        }
        $(document).ready(function() {
            $('#dob_bs').nepaliDatePicker({
                dateFormat: '%y %M %d,  %Dवार ',
                closeOnDateSelect: true,

            });

            $("#dob_ad").change(function(){
                console.log(this);
            });

            $("#dob_bs").on("dateSelect", function(event) {
                console.log(event.datePickerData.adDate);
                $("#dob_ad").val(ad(event.datePickerData.adDate));
            });
            $('#district').select2({
                placeholder: "Select a District",
                allowClear: true
            });
            $('#mun').select2({
                placeholder: "Select a Municipality",
                allowClear: true
            });

            $('#province').select2({
                placeholder: "Select a Province",
                allowClear: true
            });

            $('#district').change(function(e) {
                data = $(this).val();
                if (data != "") {
                    bodies = localBodies[data];
                    $("#mun").html("");
                    str = "<option></option>";
                    bodies.forEach(element => {
                        str += "<option value='" + element + "'>" + element + "</option>";

                    });
                    $("#mun").html(str);

                }
            });
        });



        function loadImage(input) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#gal_img').attr('src', e.target.result);
                }
                var FileSize = input.files[0].size / 1024;
                if (FileSize > 600) {
                    alert('Image Size Cannot Be Greater than 600kb');
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
