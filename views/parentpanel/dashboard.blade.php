@extends('front.app')
@section('title',"Panel")
@section('content')
<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Parent Panel</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li class="active">Pages</li>
                <li class="active">Panel</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

<div class="container" >
        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3" style="padding:5px;" >
                @include('parentpanel.menu')
            </div>
            <div class="col-md-8">
                    @include('parentpanel.error')
                    @if(count($parent->students)>0)
                      @foreach($parent->Students as $student)
                        @include('parentpanel.studentoverview',['student'=>$student])
                      @endforeach
                    @else
                      <div>
                        <h2 style="text-align:center">
                          No Students Are Associated with this Parent Account.
                        </h2>
                      </div>
                    @endif

                    
            </div>
        </div>
</div>

    @include('parentpanel.edit')
    @include('parentpanel.changepass')



    <script>
    window.onload=function(){
      @foreach($parent->Students as $student)
        <?php 
          $attendancedata=$student->AttendanceOverview();
        ?>
        
        var ctx=document.getElementById('attendancepie{{$student->id}}');
        var myChart{{$student->id}} = new Chart(ctx, {
        type: 'doughnut',
        data: {
                    datasets: [{
                        data: [
                            {{$attendancedata[1]}},{{$attendancedata[2]}}
                        ],
                        backgroundColor: [
                            window.chartColors.blue,
                            window.chartColors.red,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Present ',
                        'Absent '
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Attendance Chart',
                        position:"bottom",

                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
      @endforeach

    }
</script>
@stop