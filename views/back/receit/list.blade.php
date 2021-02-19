@extends('back.app')
@section('title',"Receipts")
@section('content')
<div style="padding:.8rem 0;">
    <a class="button primary" href="/admin/receit/add/">Add Receipt</a>
</div>
<table class="table" data-role="table">
    <thead>
    <tr>
        <th data-sortable="true" data-sort-dir="asc">#id</th>
        <th data-sortable="true" >Title</th>
        <th data-sortable="true" >Amount</th>        
        <th data-sortable="true" >Issued Date</th>
        <th data-sortable="false" >Status</th>
        <th></th><th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($receits as $receit)
        <tr>
        <td>{{$receit->id}}</td>
        <td>{{$receit->title}}</td>
        <td>Rs. {{$receit->totalamount}} |-</td>
        <td>{{$receit->issuedate}}</td>
        <?php
            $receitcontroller=new Controllers\ReceiptController($receit);
        ?>
        <td>
            <div>
                <div>Due: {{$receitcontroller->getOverView()['dues']}}</div>
                <div>paid: {{$receitcontroller->getOverView()['paids']}}</div>
            </div>
        </td>
        <td> <button style="margin-left:5px;" class="button primary" onclick="sendDueMessage({{$receit->id}})">Due Notification</button></td>
        <td><a href="/admin/receit/detail/{{$receit->id}}/">Details</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('script')
    <script>
        function sendDueMessage(receipt_id){
            axios.post('/admin/receit/sendduenotification/',{'id':receipt_id})
            .then(function(response){
                console.log(response);
                Metro.infobox.create("<p>Notification Successfully sent.</p>", "success");
            })
            .catch(function(error){
                console.log(error);
                Metro.infobox.create("<p>Sorry, Notification Not sent. Please try again</p>", "alert");
            });
        }
    </script>
@endsection