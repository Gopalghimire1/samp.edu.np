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


    <div class="container" id="top">

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
                    <a href="/student/academics/" class="btn btn-primary"><i class="fa fa-chevron-left"
                            aria-hidden="true"></i> Back to Academic Record</a>
                    <a href="/student/uploads/" class="btn btn-primary"><i class="fa fa-chevron-left"
                            aria-hidden="true"></i> Back To Document Uploads</a>

                    <a href="/student/admission/" class="btn btn-success">
                        Admission Form
                    </a>

                </div>
                <br>
                <div class="shadow" style="padding:1rem; margin-bottom:3rem;">
                    <h4>Please Select And fill the forms one at a time</h4>
                    <?php
                    $i = 0;
                    $j = 0;
                    $data = $student->fillForms();
                    ?>
                    @if (count($data) == 0)
                        <div>
                            <img src="/assets/img/no/admission.png" style="width:100%;" alt="" srcset="">
                        </div>
                    @else

                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach ($data as $item)

                                    <li role="presentation" class="{{ $i == 0 ? 'active' : '' }}"><a
                                            href="#tab_{{ $item->id }}" aria-controls="tab_{{ $item->id }}" role="tab"
                                            data-toggle="tab">{{ $item->title }}</a></li>
                                    @php
                                    $i++
                                    @endphp
                                @endforeach
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                @foreach ($data as $item)

                                    <div role="tabpanel" class="tab-pane {{ $j == 0 ? 'active' : '' }}"
                                        id="tab_{{ $item->id }}" aria-controls="tab_{{ $item->id }}">
                                        <form action="/student/admission/add/" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="openadmission_id" value="{{$item->id}}">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                            value="{{ $item->title }}" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Form Type</label>
                                                        <select type="text" class="form-control" name="type" id="type" required>
                                                            <option></option>
                                                            @foreach (explode(',', $item->types) as $t)
                                                                <option value="{{ $t }}">{{ $t }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Subject</label>
                                                        <select type="text" class="form-control" name="subject" id="subject"
                                                            required>
                                                            <option></option>
                                                            @foreach (explode(',', $item->subject) as $t)
                                                                <option value="{{ $t }}">{{ $t }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Scan / Photo of Payment Voucher
                                                        <span style="font-size: 14px;color:#9C9C9C;"> * (Image Size should below
                                                            1mb )
                                                        </span>
                                                    </label>
                                                    <div style="position: relative">
                                                        <div>
                                                            <input onchange="loadImage(this,{{$item->id}})" style="display:none;" name="image"
                                                                type="file" id="gal{{$item->id}}" accept="image/*" required />
                                                            <img src="/assets/img/payment.png" alt="..." id="gal_img{{$item->id}}"
                                                                onclick="document.getElementById('gal{{$item->id}}').click();">
                                                        </div>
                                                        <div style="position: absolute;top:0px;right:0px;">
                                                            <span class="btn btn-danger" onclick="
                                                                                            document.getElementById('gal{{$item->id}}').value = null;
                                                                                            document.getElementById('gal_img{{$item->id}}').src='/asset/img/add_image.png';
                                                                                            ">Clear</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <div class="form-group">
                                                        <input type="submit" value="Submit Form" class=" btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @php
                                    $j++
                                    @endphp
                                @endforeach
                            </div>

                        </div>
                    @endif
                </div>
                <div style="max-height: 100%;overflow-x:scroll;">

                    <table class="table">
                        <tr>
                            <td>
                                Title
                            </td>
                            <td>
                                subject
                            </td>
                            <td>Type</td>
                          
                            <td>Voucher</td>
                            <td>Status</td>
                            <td>Verified By</td>
                        </tr>
                        @foreach ($student->getAdmissions() as $item)
                        <tr>
                            <td>
                                {{$item->title}}
                            </td>
                            <td>
                                {{$item->subject}}
                            </td>
                            <td>{{$item->type}}</td>
                            <td><img src="/assets/img/student/{{$item->voucher}}" style="max-width: 200px;"></td>
                            <td>{{status[$item->status]}}</td>
                            <td>{{$item->verifiedby}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <hr>



            </div>
        </div>
    </div>

    @include('studentpanel.edit')
    @include('studentpanel.changepass')



@endsection
@section('script')
    <script>
        function loadImage(input,id) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#gal_img'+id).attr('src', e.target.result);
                }
                var FileSize = input.files[0].size / 1024;
                if (FileSize > 3072) {
                    alert('Image Size Cannot Be Greater than 3mb');
                    document.getElementById('#gal_img'+id).src = '/asset/img/add_image.png';
                    input.value = null;
                    console.log(input.files);
                } else {

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        }

    </script>
@endsection
