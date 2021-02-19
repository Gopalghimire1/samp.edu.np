<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Bill extends Eloquent{ 
            protected $fillable = ['id','date','total','student_id','level_id','created_at','updated_at',];



    public function student()
        {
            return $this->belongsTo('Models\Student');
        }

    public function level(){
        return $this->belongsTo('Models\Level');
       }
    public function billitem(){
        return $this->hasMany('Models\Billitem');
    }

}