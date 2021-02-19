@extends('back.app')
@section('title',"Download")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/download/add/"> Add Download Items</a>
</div>
<table class="table table-border cell-border" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" >title</th>
        <th data-sortable="true" >date</th>
        <th data-sortable="true" >Files</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($download as $d)
          <tr>
              <td>{{ $d->title }}</td>
              <td>{{ $d->date }}</td>
              <td><a href="/{{ $d->file }}">Download</a></td>
              <td>
                  <a href="/admin/download/edit/{{ $d->id }}/">Edit</a> ||
                  <a href="/admin/download/del/{{ $d->id }}/">Delete</a>

              </td>
          </tr>
      @endforeach
    </tbody>
    </table>

@stop