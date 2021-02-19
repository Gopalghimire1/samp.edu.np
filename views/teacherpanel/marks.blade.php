@extends('front.app')
@section('title',"RESULT ADD")
@section('content')

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Result Add</h2>
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
                    @include('teacherpanel.menu')
                </div>
                <div class="col-md-8" >
                <form method="post">
                    <table class="table" data-show-table-info="false" data-rows="-1" data-role="table" data-show-rows-steps="false" data-show-search="false">
                    <thead>
                        <tr>
                            <th data-sortable="true">Roll No</th>
                            <th data-sortable="true">Student Name</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                        @foreach($marks->students as $student)
                        <tr>
                            <td>
                                {{$student->roll}}
                            </td>
                            <td>
                                {{$student->name}}
                            </td>
                            <td>
                            <input name="mark-{{$student->id}}" value="{{$marks->get($student->id)->mark}}" />
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit data</button>
                        <input type="button" class="btn btn-warning" value="Cancel" onclick="window.location.href='/teacherpanel/'">
                    </div>
                    
                </form>
                    
                
                </div>
           
        </div>
    </div>

    @include('teacherpanel.edit')
    @include('teacherpanel.changepass')
@endsection