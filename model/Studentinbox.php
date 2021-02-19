<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Studentinbox extends Eloquent{ 
            protected $fillable = ['id','student_id','message','hasread','type','created_at','updated_at',];
public function student()
        {
            return $this->belongsTo('Models\Student');
        }
}