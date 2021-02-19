@extends('front.app')
@section('title',"note")
@section('content')

<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Notes</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Notes</li>
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
                <section id="team" >           
                        <div class="section-content">

                        <div class="pull-right" style="margin:10px;">
                          <input type="text" class="form-control" placeholder="Search" oninput="search(this)">
                        </div>

                        <div>
                           <table class="table table-bordered">
                             <tr class="bg-success">
                                <th>Title</th>
                                <th>Details</th>
                                <th>Class/Level</th>
                                <th>File Name <i class="fa fa-download text-theme-colored2 font-20"></i></th>
                             </tr>
                             @foreach($notes as $note)
                                <tr class="note" data-name="{{$note->Level()->name}}" data-title="{{$note->title}}">
                                    <td>{{$note->title}}</td>
                                    <td>{{$note->description}}</td>
                                    <td>{{$note->Level()->name}}</td>
                                    <td><a href="/asset/notes/{{$note->filename}}" class="text-underline"><i class="fa fa-file-pdf-o text-theme-colored2 font-15 mr-5"></i>{{substr($note->filename,0,20) }} </a></td>
                                </tr>
                             @endforeach
                           </table>
                        </div>
                        </div>
                    
                    </section>
                </div>
           
        </div>
    </div>

    @include('studentpanel.edit')
    @include('studentpanel.changepass')

<script>
  function search(ele){
   
    var txt = ele.value;
    var options = document.querySelectorAll(".note");
    
    for (let index = 0; index < options.length; index++) {
      const element = options[index];
      console.log(element.dataset);
      if(element.dataset.title.toLowerCase().includes(txt.toLowerCase())){
        element.style.display = "table-row";
        continue;
      }else{
        element.style.display = "none";
      }
        if(element.dataset.name.toLowerCase().includes(txt.toLowerCase())){
          element.style.display = "table-row";
          
        }else{
        element.style.display = "none";
      }
    }
  }
</script>

@endsection