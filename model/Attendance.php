<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Attendance extends Eloquent{ 
            protected $fillable = ['id','teacher_id','student_id','att','date','created_at','updated_at',];



    public function teacher()
        {
            return $this->belongsTo('Models\Teacher');
        }

    public function student(){
        return $this->hasMany('Models\Student');
       }
}