@extends('front.app')
@section('title',"Panel")
@section('content')
<div style="padding: 120px 0px 30px 0px; background-color: #24355C;">
    <h1 class="text-white font-weight-bold text-center">Parent Panel</h1>
</div>

<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3">
                @include('studentpanel.menu')
            </div>
            <div class="col-md-8">
                    
            </div>
        </div>
</div>

    @include('studentpanel.edit')
    @include('studentpanel.changepass')

@endsection
@section('script')
    <script>
         axios.post('/api/attendance/'+date+'/', attendancedata)
                    .then(function (response) {
                        console.log(response);
                       
                    })
                    .catch(function (error) {
                     
                        console.log(error);
                    });
        
    </script>

@endsection


