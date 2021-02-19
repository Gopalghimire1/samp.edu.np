<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Examsubject extends Eloquent{ 
            protected $fillable = ['id','examclass_id','teacher_id','fullmarks','passmarks','created_at','updated_at','name',];
public function examclass()
        {
            return \Models\Examclass::where('id',$this->examclass_id)->first();
        }
public function teacher()
        {
            return $this->belongsTo('Models\Teacher');
        }
public function Results()
        {
            return \Models\Result::where('examsubject_id',$this->id)->get();
        }
}