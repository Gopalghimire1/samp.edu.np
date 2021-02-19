<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Note extends Eloquent{ 
            protected $fillable = ['id','title','level_id','description','file','filename','created_at','updated_at','teacher_id'];
public function level()
        {
            return \Models\Level::where('id',$this->level_id)->first();
        }
public function teacher()
        {
          return $this->belongsTo('Models\Teacher');
        }
}