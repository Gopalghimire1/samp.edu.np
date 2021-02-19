<?php
namespace Controllers;
use Models\Attendance;
class  AttendanceManager{
    public  $attendances;
    public $date;
    public $classroom_id;
    public function loadData($date,$classroom_id){
        $this->attendances=Attendance::where('date',$date)->where('classroom_id',$classroom_id)->get();
        $this->date=$date;
        $this->classroom_id=$classroom_id;
    }

    public function set($student_id,$value){
        foreach ($this->attendances as $key => $attendance) {
            if($attendance->student_id==$student_id){
                $attendance->att=$value;
                $attendance->save();
                return $attendance;
            }
        }
        $attendance=new Attendance();
        $attendance->date=$this->date;
        $attendance->classroom_id=$this->classroom_id;
        $attendance->student_id=$student_id;
        $attendance->att=$value;
        $attendance->save();
        return $attendance;

    }
}