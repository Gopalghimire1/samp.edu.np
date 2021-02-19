<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Exam extends Eloquent{ 
            protected $fillable = ['id','name','startdate','enddate','created_at','updated_at',];
public function Examclasses()
        {
          
            return \Models\Examclass::where('exam_id',$this->id)->get();
        }
}