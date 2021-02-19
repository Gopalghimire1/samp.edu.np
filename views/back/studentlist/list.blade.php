@extends('back.app')
@section('title',"Student List")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/stdlist/add/"> Add STD list </a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >Files</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($studentlist as $d)
          <tr>
              <td>{{ $d->title }}</td>
              <td><a href="/{{ $d->file }}">View</a></td>
              <td>
                  <a href="/admin/stdlist/del/{{ $d->id }}/">Delete</a>
              </td>
          </tr>
      @endforeach
    </tbody>
    </table>

@stop