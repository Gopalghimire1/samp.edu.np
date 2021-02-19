@extends('back.app')
@section('title', 'Addmission Request')
@section('content')
<style>
    @media print{
   .noprint{
       display:none;
   }
   .cell-full{
       
   flex: 0 0 100% !important;
    max-width: 100% !important;
   }
}
</style>
    <h4>Admission Detail / {{ $ad->id }} / {{ $student->name }}</h4>
    <hr />
    <div>
        <h5>Personal Infomation</h5>
        <hr>
        <div class="row">
            <div class="cell-6">
                <strong>Name : </strong>
                {{ $student->name }}
            </div>
            <div class="cell-6">

                {{ $student->name_dev }}
            </div>
            <div class="cell-6">
                <strong>Father Name : </strong>
                {{ $student->fathername }}
            </div>
            <div class="cell-6">
                <strong>Mother Name : </strong>
                {{ $student->mothername }}
            </div>
            <div class="cell-6">
                <strong>Province : </strong>
                {{ $student->province }}
            </div>
            <div class="cell-6">
                <strong>District : </strong>
                {{ $student->district }}
            </div>
            <div class="cell-12">
                <strong>Municipality : </strong>
                {{ $student->mun }}, ward no {{ $student->wardno }}
            </div>
            <div class="cell-6">
                <strong>Contactno : </strong>{{ $student->phone }}
            </div>
            <div class="cell-6">
                <strong>Email : </strong>{{ $student->email }}
            </div>
            <div class="cell-4">
                <strong>Gender : </strong>{{ $student->gender }}

            </div>
            <div class="cell-4">
                <strong>Religion : </strong>{{ $student->religion }}

            </div>
            
            <div class="cell-4">
                <strong>Caste : </strong>{{ $student->caste }}
            </div>
            <div class="cell-8">
                <strong>Date of Birth : </strong>{{ $student->dob_bs }} ( {{ $student->dob_ad }})
            </div>
           
                    <div class="cell-2 noprint">
                        <img class="download" src="/assets/img/student/{{$student->photo}}" style="width:100%;" download="{{$student->name}}_pp_{{$student->id}}"/>
                    </div>
                
        </div>
    </div>
    <hr>
    <div>
        <div class="row">
            <div class="cell-6 cell-full">
                <h5>
                    Admission Detail
                </h5>
                <hr>
                
                <div>
                    <div style="max-width: 100%;overflow-x:scroll;">

                        <table class="table">
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    subject
                                </th>
                                <th>Type</th>


                                <th>Status</th>
                               
                            </tr>
                          
                                <tr>
                                    <td>
                                        {{ $ad->title }}
                                    </td>
                                    <td>
                                        {{ $ad->subject }}
                                    </td>
                                    <td>{{ $ad->type }}</td>

                                    <td>{{ status[$ad->status] }}</td>
                                    
                                </tr>
                      
                        </table>
                    </div>
                </div>
            </div>

            <div class="cell-6">
                <h5>Voucher</h5>
                <hr>
                <img class="download noprint" src="/assets/img/student/{{ $ad->voucher }}" style="max-width: 100%;" download="{{$student->name}}_voucher_{{$student->id}}">
            </div>
        </div>
    </div>
    <hr>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }



        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid black;
        }

        tr {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

    </style>
    <div>
        <h5>Academic Record</h5>
        <hr>
        <table class="table">
            <tr>
                <th>
                    Title
                </th>
                <th>
                    organization
                </th>
                <th>Passed Year</th>
                <th>symbolno</th>
                <th colspan="4" style="text-align: center;">Academics</th>
            </tr>
            {!! $student->academicsRender() !!}
        </table>
    </div>
    <hr>
    <div >
        <h5 onclick="downloadAll()" class="noprint">Documents</h5>
        <hr>
        <div>
            @foreach ($student->uploads() as $item)

                <div class="row" style="margin:2rem 0rem;">
                    <div class="cell-4 noprint">
                        <img class="download" src="/assets/img/student/{{ $item->file }}" download="{{$student->name}}_{{ $item->title }}_{{$item->remark}}_{{$student->id}}" style="width:100%">
                    </div>
                    <div class="col-md-8">
                        <h4>{{ $item->title }}</h4>
                        <br>
                        <p class="noprint"> <strong>Verified By:</strong>{{ $item->verified_by }} </p>
                        <p class="noprint"> <strong>Remarks:</strong>{{ $item->remark }} </p>

                    </div>
                </div>
            @endforeach
        </div>


    </div>
    <div class="noprint" style="position:fixed;bottom:5px;right:5px;background:white;">
        @if($old>0)
        <a class="button secondary" href="/admin/admission/detail/{{$prev}}/">Previous</a>
        @endif
        <form action="/admission/accept/" method="post" style="display:inline-block;">
            <input type="hidden" name="id" value="{{$ad->id}}">
            <button class="button primary">Accept</button>
        </form>   
        <form action="/admission/reject/" method="post" style="display:inline-block;">
            <input type="hidden" name="id" value="{{$ad->id}}">
            <button class="button alert">Reject</button>
        </form>
         <button class="button success" onclick="downloadAll()">Download Images</button>
        @if($new>0)
        <a class="button secondary" href="/admin/admission/detail/{{$next}}/">Next</a>
        @endif
    </div>
@endsection
@section('script')
    <script>
        function downloadAll(){  
        $('.download').each(function() {
            file=$( this ).attr( "src" );
            attr=$( this ).attr( "download" );
            var theAnchor = $('<a />')  
                .attr('href', file)  
                .attr('download',attr);  
                console.log(theAnchor)
            theAnchor[0].click();  
            theAnchor[0].remove();  
            console.log(file,attr);
        });
        
        
    }  
    
    
    </script>
@endsection
