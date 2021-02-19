@extends('front.app')
@section('title',"Panel")
@section('content')
<div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">Parent Panel > Result</h1>
</div>

<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('parentpanel.menu')
            </div>
            <div class="col-md-8">
                @foreach($results as $key=>$result)
                <div id="accordion">
                    <div >
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
                    
                    <div id="collapse-{{$key}}" class="collapse in" aria-labelledby="headingOne">
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
                                <span style="float:right">
                                    Result : {{$result['summary']['status']}}
                                </span>
                                <span style="flaot:left">
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

    @include('parentpanel.edit')
    @include('parentpanel.changepass')

@stop