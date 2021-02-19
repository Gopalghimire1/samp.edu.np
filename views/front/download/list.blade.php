@extends('front.app')
@section('title',"Download Page")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7"  data-bg-img="/assets/img/bg2.jpg"">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">डाउन्लोड गर्नुहोस</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">मूल पृष्ठ </a></li>
                <li class="active">पृष्ठहरु </li>
                <li class="active">डाउन्लोड </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    <div class="row" style="margin-top:3rem; margin-bottom:3rem;" >

      <div  class="col-md-12">
        <h4 class="text-center">डाउन्लोड गर्नुहोस</h4>
        <hr>
        <table class="table table-bordered">
          <tr>
            <Th>मिति </Th>
            <th>सिर्षक </th>
            <th>जानकारी </th>
            <th>फायल</th>
          </tr>
          <tbody id="tableBody">
            @foreach ($download as $item)
              <tr>
                  <td>{{ $item->date }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->detail }}</td>
                  <td><a href="/{{ $item->file }}">डाउन्लोड</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection