@extends('back.app')
@section('title', 'Addmission Request')
@section('content')
    <h4>Admission Request</h4>
    <hr />

    <div class="cell-md-12">

        <table class="table" data-role="table" >
            <thead>
                <tr>
                    <th>Admission_id</th>
                    <th>title</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Subject</th>
                    <th>status</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $l)
                    <tr>
                        <td>
                            <div>
                                <span>{{ $l->id }}</span>
                                <span><a href="/admin/admission/detail/{{$l->id}}/">Detail</a> </span>
                            </div>
                            
                        </td>
                        <td>{{ $l->title }}</td>
                        <td>{{ $l->student->name }}</td>
                        <td>{{ $l->student->phone }}</td>
                        <td>{{ $l->type }}</td>
                        <td>{{ $l->subject }}</td>
                        <td>{{ $l->status }}</td>
                      

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
