@extends('front.app')
@section('title',"ADDNOTE")
@section('content')
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Student Notes</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Note Upload</li>
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

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Subject name" required>
                        </div>

                        <div class="form-group">
                            <label>Level/Class</label>
                            <select style="width:200px;" class="form-control" data-role='select' name='level_id' id="level_id" >
                                @foreach ($levels as $level)
                                    <option value="{{$level->id}}">
                                        {{$level->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="file" class="form-control" required >
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea  name="description" rows="3" class="form-control"></textarea>
                        </div>
                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                        <div class="form-group">
                            <button class="btn btn-primary">Upload</button>
                            <a href="/teacherpanel/note/list/" class="btn btn-success">Note List</a>
                        </div>
                    </form>
                   
                </div>
           
        </div>
    </div>

    @include('teacherpanel.edit')
    @include('teacherpanel.changepass')
@endsection