<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Mock extends Eloquent{ 
            protected $fillable = ['id','duration','noofquestion','classroom_id','created_at','updated_at',];
public function classroom()
        {
            return $this->belongsTo('Models\Classroom');
        }
public function Mockquestions()
        {
            return $this->hasMany('Models\Mockquestion');
        }
public function Mockresults()
        {
            return $this->hasMany('Models\Mockresult');
        }
}