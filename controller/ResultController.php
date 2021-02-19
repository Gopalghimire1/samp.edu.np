<?php
namespace Controllers;
use Models\Result;
use Models\Student;
use Models\Examsubject;
class ResultController{
    public $results;
    public $examsubject_id;
    public $examsubject;
    public $students;
    public $examclass;

    public function loaddata($examsubject_id){
        $this->results=Result::where('examsubject_id',$examsubject_id)->get();
        $this->examsubject=Examsubject::where('id',$examsubject_id)->first();
        $this->examclass=$this->examsubject->examclass();
        $this->students=Student::where('level_id',$this->examclass->level_id)->get();
        $this->examsubject_id=$examsubject_id;
    }

    public function has($student_id){
        foreach ($this->results as  $result) {
            if($result->student_id===$student_id){
                return true;
            }
        }
        return false;
    }

    public function get($student_id){
        foreach ($this->results as  $result) {
            if($result->student_id===$student_id){
                return $result;
            }
        }
        return New Result(['mark'=>0]);
    }

    public function set($student_id,$mark){
        foreach ($this->results as  $result) {
            if($result->student_id===$student_id){
                $result->mark=$mark;
                $result->save();
                return $result;
            }
        }
        $result=new Result();
        $result->examsubject_id=$this->examsubject_id;
        $result->student_id=$student_id;
        $result->mark=$mark;
        $result->save();
        return $result;
    }






    

}