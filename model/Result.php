<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Result extends Eloquent{ 
            protected $fillable = ['id','student_id','examsubject_id','mark','created_at','updated_at',];
public function student()
        {
            return \Models\Student::where('id',$this->student_id)->first();
        }
public function examsubject()
        {
            
            return \Models\Examsubject::where('id',$this->examsubject_id)->first();
            
        }
public function examclass(){
            return \Models\Examclass::where('id',$this->examsubject()->examclass_id)->first();
        }

public function exam(){
            return \Models\Exam::where('id',$this->examclass()->exam_id)->first();
        }
}