@extends('back.app')
@section('title','LIST SLIDER')
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/slider/add/">Slider Add</a>
</div>


<table class="table table-border cell-border" >
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Caption</th>
        <th data-sortable="false" >Sub Caption</th>
        <th data-sortable="false" >Button Text</th>
        <th data-sortable="false" >Image</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($sliders as $slid)
        <tr>
        <td>{{$slid->id}}</td>
        <td>{{$slid->caption}}</td>
        <td>{{$slid->subcaption}}</td>
        <td>{{$slid->button}}</td>
        <td><img src="/{{$slid->image}}" alt="" style="height:100px; width:200px;"></td>
        <td><a href="/admin/slider/edit/{{$slid->id}}/">Edit</a></td>
        <td><a href="/admin/slider/del/{{$slid->id}}/">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection