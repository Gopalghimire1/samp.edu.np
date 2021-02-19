<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Level extends Eloquent{ 
            protected $fillable = ['id','name','created_at','updated_at',];
public function Classrooms()
        {
            return $this->hasMany('Models\Classroom');
        }
public function Examclasses()
        {
            return \Models\Examclass::where('examclass_id',$this->id)->get();
            
        }
public function Fees()
        {
            return \Models\Fee::where('level_id',$this->id)->get();
        }
public function Notes()
        {
            return $this->hasMany('Models\Note');
        }
public function Students()
        {
            return $this->hasMany('Models\Student');
        }
public function Subjects()
        {
            return $this->hasMany('Models\Subject');
        }
public function Bill()
        {
            return $this->hasMany('Models\Bill');
        }
}