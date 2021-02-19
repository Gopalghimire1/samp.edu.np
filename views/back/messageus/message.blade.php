@extends('back.app')
@section('title', 'Messaging')
@section('content')

<table class="table table-border cell-border compact">
    <thead>
    <tr>
        <th>#id</th>
        <th>Name</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Messages</th>
        <th>Address</th>
    </tr>   
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->firstname}} {{$contact->lastname}}</td>
            <td>{{$contact->phone}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->message}}</td>
            <td>{{$contact->address}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection