@extends('front.app')
@section('title',"Panel")
@section('content')
<div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">Parent Panel > Result</h1>
</div>
<style>
    .table{
        border-radius:10px;
    }

    .table tr:first-child {
        background:#362F4B;
        color:#E2DDEB;
        border-radius:10px !important;
    }
    .fee-card{
        border:1px solid #efefef;
        /* border-radius:5px; */
        padding:5px;
        /* box-shadow: 2px 4px 4px 4px #888888; */
        box-shadow: 0 0px 0px rgba(0, 0, 0, 0.2);
        /* overflow: hidden; */
        position: relative;
        top: 0;
        text-align: center;
        transition: all 0.25s;
    }
    .fee-card:hover{
        top: -5px;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }
    .card-title p{
        margin-top: 5px;
        text-align: left;
        text-transform: uppercase;
    }
    .card-title hr{
        margin-top: 15px;
    }
    .card-title img{
        width: 50px;
        height: auto;
        float: right;
        /* top: 0; */
        /* bottom: 0; */
        position: absolute;
        top: -15px;
        right: 0;
    }
    
</style>
<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('parentpanel.menu')
            </div>
            <div class="col-md-8 " style="border-left:2px solid #f1f1f1; ">
                <div>
                    <ul class="nav nav-tabs nav-justified" style="padding:0px;">
                        <li class="active"><a href="#Due" data-toggle="tab" style="padding:10px;">Due</a></li>
                        <li><a href="#Paid" data-toggle="tab" style="padding:10px;">Paid</a></li>
                    </ul>
                    <div class="tab-content" style="border:none;">
                        <div id="Due" class="tab-pane fade in active">
                            <div class="row" style="padding:0px;" >
                                    @foreach($pc->duefees as $fee)
                                        <div class="col-md-6 col-sm-12" style="padding:10px;">
                                        <div class="fee-card" style="">
                                            <div class="card-title">
                                            <p>{{$fee->title}}</p>
                                            <img src="/asset/img/money.png" alt="">
                                            <hr> 
                                            </div>
                                            
                                            <div style='display:inline-block;float:left'>Rs. {{$fee->totalamount}}</div>
                                            <div style='display:inline-block;float:right'>
                                                <button data-toggle="modal" data-target="#feedetail-{{$fee->id}}" class="btn btn-link" style="padding:0px 10px;">
                                                    Details
                                                </button>|
                                                <button class="btn btn-link" style="padding:0px 10px;">
                                                    Pay
                                                </button>
                                            </div>
                                            <div style='clear:both'></div>
                                        </div>


                                        </div>
                                    @endforeach
                            </div>
                        </div>
                        <div id="Paid" class="tab-pane fade">
                            <div class="row" style="padding:0px;" >
                                @foreach($pc->paidfees as $fee)
                                    <div class="col-md-6 col-sm-12" style="padding:10px;">
                                    <div style="border:1px solid #efefef;border-radius:5px;padding:5px;box-shadow: 2px 4px 4px 4px #888888;">
                                        <p>{{$fee->title}}</p>
                                        <hr>
                                        <div style='display:inline-block;float:left'>Rs. {{$fee->totalamount}}</div>
                                        <div style='display:inline-block;float:right'>
                                            <button data-toggle="modal" data-target="#feedetail-{{$fee->id}}" class="btn btn-link" style="padding:0px 10px;">
                                                Details
                                            </button>|
                                            <button class="btn btn-link" style="padding:0px 10px;">
                                                Pay
                                            </button>
                                        </div>
                                        <div style='clear:both'></div>
                                    </div>


                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                    
            </div>
        </div>
</div>


@foreach($pc->duefees as $fee)
<!--start Model -->
<div class="modal fade" id="feedetail-{{$fee->id}}" role="dialog">
    <div class="modal-dialog modal-lg ">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;">#{{$fee->title}}</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    Invoice no: {{$fee->id}}
                </div>
                <div class="col-md-4 col-sm-6">
                    Issued Date: {{$fee->issuedate}}
                </div>
                <div class="col-md-4 col-sm-6">
                    Due Date: {{$fee->duedate}}                
                </div>
                
                <div class="col-md-12" style="border-top: 1px solid #f1f1f1;padding:10px 0px;">
                    <table class="table">
                        <tr><th>Particular</th><th>Rate</th><th>quantity</th></tr>
                        @foreach($fee->Receit->Receititems as $feeitems)
                            <tr><td>{{$feeitems->particular}}</td><td>{{$feeitems->rate}}</td><td>{{$feeitems->qty}}</td></tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-4 col-sm-6">
                   Total Amount: {{$fee->totalamount}}                
                </div>
            </div>

        </div>
        
      </div>
    </div>
  </div> 
</div>
<!--end Model -->
@endforeach

    @include('parentpanel.edit')
    @include('parentpanel.changepass')

@stop