<?php 
namespace Controllers;
use Models\Result;
use Models\Student;
use Models\Examsubject;
use Models\Examclass;

use Models\Exam;
class ResultViwer{
    public $student_id;
    public $exams;
    public $examclass;

    public function __construct($student_id){
        $this->student_id=$student_id;
    }

    public function get(){
        $results=Result::where('student_id',$this->student_id)->orderBy('id', 'desc')->get();
        $exam=[];
        foreach ($results as  $result) {
            $es=$result->examsubject();
            $ec=$result->examclass();
            $e=$result->exam();
            if(!isset($exam[$e->id]['info'])){
                $exam[$e->id]['info']=['examname'=>$e->name,'startdate'=>$e->startdate,'enddate'=>$e->enddate,'level'=>$ec->level()->name];
            }
            if(!isset($exam[$e->id]['examclass'])){
                $exam[$e->id]['examclass']=$ec;
            }
            $exam[$e->id]['result'][$es->id]=['subname'=>$es->name,'fullmarks'=>$es->fullmarks,'passmarks'=>$es->passmarks,'marks'=>$result->mark];
        }
        foreach ($exam as $key =>$e) {
            foreach ($exam[$key]['examclass']->examsubjects() as $es) {
                if(!isset($exam[$key]['result'][$es->id])){
                    $exam[$key]['result'][$es->id]=['subname'=>$es->name,'fullmarks'=>$es->fullmarks,'passmarks'=>$es->passmarks,'marks'=>"Absent"];
                }
              
            }
        }
        foreach ($exam as $key =>$e) {
            $pass=true;
            $totalfullmarks=0;
            $totalmarks=0;
            foreach ($exam[$key]['result'] as $result) {
                if($result['marks']=="Absent"){
                    $pass=false;
                }else if($result['marks']<$result['passmarks']){
                    $pass=false;
                }
                $totalfullmarks+=$result['fullmarks'];
                if($result['marks']<>"Absent"){
                    $totalmarks+=$result['marks'];
                }
            }
            if($pass){
                $percentage=$totalmarks/$totalfullmarks*100.0;
                $exam[$key]['summary']=['status'=>'pass','totalfullmarks'=>$totalfullmarks,'totalmarks'=>$totalmarks,"percentage"=>$percentage];
            }else{
                $percentage=$totalmarks/$totalfullmarks*100.0;
                $exam[$key]['summary']=['status'=>'fail','totalfullmarks'=>$totalfullmarks,'totalmarks'=>$totalmarks,"percentage"=>'NA'];
            }
        }
        return $exam;
    }

}