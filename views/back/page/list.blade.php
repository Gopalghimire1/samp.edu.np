@extends('back.app')
@section('title', $title)
@section('content')
    @php
    $datas=\Models\Page::where('type',$type)->get();
    @endphp
    <h1 style="padding: 0px 10px;font-weight:400;">
        {{ $title }}
        <span style="padding-left:1rem">
            @if ($type == course)
                <a href="/admin/course/add/" class="button primary" style="font-size: 14px;">Add New</a>
            @else
                @if ($type == feature)
                    <a href="/admin/feature/add/" class="button primary" style="font-size: 14px;">Add New</a>


                @else
                    <a href="/admin/message/add/" class="button primary" style="font-size: 14px;">Add New</a>

                @endif
            @endif
        </span>
    </h1>
    <table class="table" data-role="table">
        <thead>
            <tr>
                <th data-sortable="true" data-sort-dir="asc">#id</th>
                <th data-sortable="true">title</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $notice)
                <tr>
                    <td>{{ $notice->id }}</td>
                    <td>{{ $notice->title }}</td>
                    <td><a href="/admin/page/edit/{{ $notice->id }}/">Edit</a></td>
                    <td><a href="/admin/page/del/{{ $notice->id }}/">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
