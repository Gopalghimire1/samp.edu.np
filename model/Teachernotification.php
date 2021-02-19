<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Teachernotification extends Eloquent{ 
            protected $fillable = ['id','authkey','teacher_id','updated_at','created_at',];
public function teacher()
        {
            return $this->belongsTo('Models\Teacher');
        }
}