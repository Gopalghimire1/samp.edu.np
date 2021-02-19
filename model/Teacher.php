<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Teacher extends Eloquent{ 
            protected $fillable = ['id','name','adress','phone','education','photo','email','description','password','isarchived','created_at','updated_at','faculty_id'];
public function Examsubjects()
        {
            return \Models\Examsubjects::where('examclass_id',$this->id)->get();
           
        }

        public function faculty(){
          return \Models\Faculty::find($this->faculty_id);
        }
        public function Classchedule(){
          return $this->hasMany('Models\Classchedule');
        }
        public function note(){
          return $this->hasMany('Models\Note');
        }
}