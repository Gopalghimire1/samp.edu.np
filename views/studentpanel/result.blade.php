@extends('front.app')
@section('title',"Panel")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Student Result</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Result</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('studentpanel.menu')
            </div>
            <div class="col-md-8">
                @foreach($results as $key=>$result)
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                {{$result['info']['examname']}} 
                                </button>
                                <br/>
                                <span class="float-right" style="font-size: 15px;">
                                        ({{str_replace('-','/',$result['info']['startdate'])}} - {{$result['info']['enddate']}})
                                </span>
                          </h5>
                        </div>
                    
                    <div id="collapse-{{$key}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Full Marks
                                    </th>
                                    <th>
                                        Pass Marks
                                    </th>
                                    <th>
                                        Marks
                                    </th>

                                </tr>
                                @foreach($result['result'] as $marks)
                                    <tr>
                                        <td>
                                            {{$marks['subname']}}
                                        </td>
                                        <td>
                                            {{$marks['fullmarks']}}
                                        </td>
                                        <td>
                                            {{$marks['passmarks']}}
                                        </td>
                                        <td>
                                            {{$marks['marks']}}
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td>
                                        {{$result['summary']['totalfullmarks']}}
                                    </td>
                                    <td></td>
                                    <td>
                                            {{$result['summary']['totalmarks']}}
                                    </td>
                                </tr>
                            </table>
                            <div>
                                <span class="float-right">
                                    Result : {{$result['summary']['status']}}
                                </span>
                                <span class="flaot-right">
                                    Percentage : {{$result['summary']['percentage']}}
                                </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                </div>
            </div>
            </div>
        </div>
</div>

    @include('studentpanel.edit')
    @include('studentpanel.changepass')

@stop