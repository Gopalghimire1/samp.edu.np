<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Mockresult extends Eloquent{ 
            protected $fillable = ['id','marks','mock_id','student_id','created_at','updated_at',];
public function mock()
        {
            return $this->belongsTo('Models\Mock');
        }
public function student()
        {
            return $this->belongsTo('Models\Student');
        }
}