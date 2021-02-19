<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Studentnotification extends Eloquent{ 
            protected $fillable = ['id','authkey','student_id','updated_at','created_at',];
public function student()
        {
            return $this->belongsTo('Models\Student');
        }
}