<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Examclass extends Eloquent{ 
            protected $fillable = ['id','level_id','exam_id','created_at','updated_at',];
public function level()
        {
            return \Models\Level::where('id',$this->level_id)->first();
        }
public function exam()
        {
            return $this->belongsTo('Models\Exam');
        }
public function Examsubjects()
        {
            return \Models\Examsubject::where('examclass_id',$this->id)->get();
        }
}