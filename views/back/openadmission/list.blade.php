@extends('back.app')
@section('title', 'Admission Openings')
@section('content')
    @php
    $datas=\Models\Openadmission::all();
    @endphp
    <br>
    <h4 style="padding: 0px 10px;font-weight:400;">
        Admission Openings


        <a href="/admin/opad/add/" class="button primary" style="font-size: 14px;">Add New</a>


        </span>
    </h4>
    <table class="table" >
        <thead>
            <tr>
                <th data-sortable="true" data-sort-dir="asc">#id</th>
                <th data-sortable="false">message</th>
                <th data-sortable="false">subjects</th>
                <th data-sortable="false">Types</th>
                <th data-sortable="true">Fiscal year</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        <div style="max-width:200px; word-wrap: break-word;">{{ $data->message }}</div>
                    </td>
                    <td><div style="max-width:200px; overflow-wrap: break-word;">{{ $data->subject }}</div></td>
                    <td>{{ $data->types }}</td>
                    <td>{{ $data->ay }}</td>
                    @if ($data->enabled == 0)
                        <td><a href="/admin/opad/open/{{ $data->id }}/">Open</a></td>

                    @else
                        <td><a href="/admin/opad/close/{{ $data->id }}/">Close</a></td>

                    @endif
                    <td>
                        <a href="/admin/admission/selective/{{ $data->id }}/">Applications ({{$data->listCount()}})</a>
                        <br>
                        <a href="/admin/admission/selective/{{ $data->id }}/status/0/">Pending ({{$data->pendingCount()}})</a>
                        <br>
                        <a href="/admin/admission/selective/{{ $data->id }}/status/1/">Accepted ({{$data->activeCount()}})</a>
                        <br>
                        <a href="/admin/admission/selective/{{ $data->id }}/status/2/">Rejected ({{$data->cancelCount()}})</a>
                        <br>
                        <a href="/admin/opad/edit/{{ $data->id }}/">Edit</a>|
                        <a href="/admin/opad/del/{{ $data->id }}/">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
