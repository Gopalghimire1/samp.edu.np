<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Classroom extends Eloquent{ 
            protected $fillable = ['id','level_id','created_at','updated_at','section',];
        public function level()
        {
            return \Models\Level::where('id',$this->level_id)->first();
        }
        public function Students()
        {
            return \Models\Student::where('classroom_id',$this->id)->get();
        }
        public function Classchedule(){
            return $this->hasMany('Models\Classchedule');
        }
    public function mock(){
        return $this->belongsTo('Models\Mock');
    }
}