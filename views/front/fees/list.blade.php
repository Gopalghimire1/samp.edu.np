@extends('front.app')
@section('title',"Result Page")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Result Published</h2>
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
<div class="container">
    <div class="row" style="margin-top:3rem; margin-bottom:3rem;" >
      <div class="col-md-4">
          <form>
            <div class="form-group">
              <label for="choose">Choose Exam Type</label>
              <select name="examtype" class="form-control" id="examtype"> 
                <option value="">==== Exam Type ====</option>
                <option value="1">First Term</option>
                <option value="2">Second Term</option>
                <option value="3">Third Term</option>
                <option value="4">Test</option>
              </select>
            </div>
          </form>
      </div>

      <div  class="col-md-8">
        <h4 class="text-center">Your Requested Response</h4>
        <hr>
        <table class="table table-bordered">
          <tr>
            <Th>Date</Th>
            <th>Title</th>
            <th>Exam Type</th>
            <Th>Publisher</Th>
            <th>Files</th>
          </tr>
          <tbody id="tableBody">

          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection
@section('script')
<script>
  $('#examtype').on('change', function(e){
    var type = e.target.value;
    console.log(type);
    axios.get('/result/'+type)
      .then(function (response) {
          var result = response.data;
          console.log(result);
          $('#tableBody').empty();
            if(result.length == 0){
            $('#tableBody').append('<tr><td colspan="5" class="text-center">Result is not uploaded yet</td></tr>');
            }
         
          result.forEach(element => {
            if(element.examtype==1){
            $('#tableBody').append('<tr><td>'+element.date+'</td><td>'+element.title+'</td><td>First Term</td><td>'+element.publisher+'</td><td><a href="'+element.file+'">View</a>');  
            } 
            if(element.examtype==2){
            $('#tableBody').append('<tr><td>'+element.date+'</td><td>'+element.title+'</td><td>Second Term</td><td>'+element.publisher+'</td><td><a href="'+element.file+'">View</a>');   
            }
            if(element.examtype==3){
            $('#tableBody').append('<tr><td>'+element.date+'</td><td>'+element.title+'</td><td>Third Term</td><td>'+element.publisher+'</td><td><a href="/'+element.file+'">View</a>');   
            }
            if(element.examtype==4){
            $('#tableBody').append('<tr><td>'+element.date+'</td><td>'+element.title+'</td><td>Test</td><td>'+element.publisher+'</td><td><a href="/'+element.file+'">View</a>');   
            }
            
         });

      console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    })
  });
</script>
@endsection