@extends('front.app')
@section('title',"MOCKQUESTION LIST")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Mock Question List </h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Mock List</li>
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
                    <table class="table table-bordered">
                        <tr>
                            <th>#Id</th>
                            <th>Questions</th>
                            <th>Options</th>
                            <th>Correct Options</th>
                            <th></th>
                        </tr>

                        @foreach($mockq as $mock)
                            <tr>
                                <td>{{$mock->id}}</td>
                                <td id="question-{{$mock->id}}">{{$mock->question}}</td>
                                <td id="options-{{$mock->id}}">{{$mock->options}}</td>
                                <td id="correct-{{$mock->id}}">{{$mock->correct}}</td>
                                <td><p data-toggle="modal"  data-target="#mockquestion-{{$mock->id}}" class="btn btn-link btn-xs">Edit Question</p></td></td>
                            </tr>
                        @endforeach

                    </table>
                    
                
                </div>
           
        </div>
    </div>


@foreach($mockq as $mock)
    <!-- model box -->
  <div class="modal fade" id="mockquestion-{{$mock->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Question Modification</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
         <form method="post" id="addquestion{{$mock->id}}" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="{{$mock->id}}">
                        <div class="form-group">
                            <label for="question">Question</label>
                             <textarea name="question" id="question"  rows="4" class="form-control" placeholder="Enter Question" >{{$mock->question}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="ans">Answer</label>
                            <input type="text" id="options" name="options" class="form-control" placeholder="Enter answer like opt1, opt2, opt3, opt4" value="{{$mock->options}}">
                        </div>
                        <div class="form-group">
                            <label for="ans">Correct Answer</label>
                            <select data-role="select" name="correct" class="form-control"
                            >
                                <option value="1"
                                  @if($mock->correct==1)
                                  selected="selected"
                                  @endif
                                >Opt1</option>
                                <option value="2"
                                @if($mock->correct==2)
                                selected="selected"
                                @endif
                                >Opt2</option>
                                <option value="3"
                                @if($mock->correct==3)
                                selected="selected"
                                @endif
                                >Opt3</option>
                                <option value="4"
                                @if($mock->correct==4)
                                selected="selected"
                                @endif
                                >Opt4</option>
                            </select>
                        </div>
                          <div class="modal-footer d-flex justify-content-center">
                              <span onclick="AddMockQuestion({{$mock->id}});" class="btn btn-primary">upload</span>
                          </div>
                    </form>
      </div>
    </div>
  </div>
</div>
@endforeach
    @include('teacherpanel.edit')
    @include('teacherpanel.changepass')

@endsection

@section('script')
  <script>php
    function AddMockQuestion(id){
      var fdata=new FormData(document.getElementById('addquestion'+id));
      axios.post('/teacherpanel/mockquestion/edit/',fdata)
      .then(function(response){
        console.log(response);
        data=response.data;
        console.log(data);
        if(data.success==true){
          var mockquestion=data.data.mockq;
          document.getElementById('question-'+mockquestion.id).innerHTML=mockquestion.question;
          document.getElementById('options-'+mockquestion.id).innerHTML=mockquestion.options;
          document.getElementById('correct-'+mockquestion.id).innerHTML=mockquestion.correct;
          toastem.success("Modification successfully");
           }else{
          toastem.error("Data Cannot Be Loaded");
        }
      })
      .catch(function(error){
        toastem.error("Data Cannot Be Loaded");
      });
    }
  </script>
@endsection