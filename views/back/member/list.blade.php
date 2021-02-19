@extends('back.app')
@section('title', 'Member List')
@section('content')
    @php
    $datas=\Models\Member::all();
    @endphp
    <br>
    <h4 style="padding: 0px 10px;font-weight:400;">
    


        <a href="/admin/member/add/" class="button primary" style="font-size: 14px;">Add Member</a>
        </span>
    </h4>
    <table class="table" data-role="table">
        <thead>
            <tr>
                <th data-sortable="true" data-sort-dir="asc">#id</th>
                <th data-sortable="true">Name</th>
                <th data-sortable="true">Designation</th>
                <th data-sortable="true">Image</th>
            
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        <div style="max-width:200px;">{{ $data->name }}</div>
                    </td>
                    <td>{{ $data->desig }}</td>
                    <td> <img src="/assets/img/page/{{ $data->image }}" alt="" srcset="" style="max-width:200px;" ></td>
                    <td>
                        <a href="/admin/member/edit/{{$data->id}}/">Edit</a>|
                        <a href="/admin/member/del/{{$data->id}}/">Delete</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
