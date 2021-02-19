@extends('front.app')
@section('title',"student list")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" ddata-bg-img="/assets/img/bg2.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Download Items</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">studentlist</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    <div class="row" style="margin-top:3rem; margin-bottom:3rem;" >

      <div  class="col-md-12">
        <h4 class="text-center">Download Items Here</h4>
        <hr>
        <table class="table table-bordered">
          <tr>
           <th>Title</th>
            <th>Files</th>
          </tr>
          <tbody id="tableBody">
            @foreach ($studentlist as $item)
              <tr>
                  
                  <td>{{ $item->title }}</td>
                  <td><a href="/{{ $item->file }}">Download</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection