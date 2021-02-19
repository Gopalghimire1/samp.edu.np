<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Mockquestion extends Eloquent{ 
            protected $fillable = ['id','question','options','correct','mock_id','created_at','updated_at','teacher_id'];
public function mock()
        {
            return $this->belongsTo('Models\Mock');
        }
}