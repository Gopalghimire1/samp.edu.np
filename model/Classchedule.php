<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Classchedule extends Eloquent{ 
            protected $fillable = ['id','starttime','endtime','subname','dayofweek','classroom_id','teacher_id','created_at','updated_at',];
public function classroom()
        {
            return \Models\Classroom::where('id',$this->classroom_id)->first();
            // return $this->belongsTo('Models\Classroom');
        }
public function teacher()
        {
            return $this->belongsTo('Models\Teacher');
        }
}