@extends('front.app')
@section('title',"EDITNOTE")
@section('content')
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="/asset/img/H.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Modify Notes</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Student Note</li>
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
                            <input type="text" name="title" class="form-control" placeholder="Enter Subject name" value="{{$note->title}}">
                        </div>

                        <div class="form-group">
                            <label>Level/Class</label>
                            <select style="width:300px;" class="form-control" data-role='select' name='level_id' id="level_id" >
                                @foreach ($levels as $level)
                                    <option value="{{$level->id}}"
                                    @if ($note->level_id==$level->id)
                                    selected="selected"
                                    @endif
                                    >
                                        {{$level->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="file" class="form-control" > Current File : {{$note->filename}}
                           
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea  name="description" rows="3" class="form-control">{{$note->description}}</textarea>
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