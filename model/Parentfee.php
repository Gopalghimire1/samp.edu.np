<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Parentfee extends Eloquent{ 
            protected $fillable = ['id','duedate','title','issuedate','totalamount','discount','paid','due','remarks','studentparent_id','student_id','created_at','updated_at','receit_id'];
public function studentparent()
        {
            return $this->belongsTo('Models\Studentparent');
        }
public function student()
        {
            return $this->belongsTo('Models\Student');
        }
public function Parentfeeitems()
        {
            return $this->hasMany('Models\Parentfeeitem');
        }
public function Parentpaids()
        {
            return $this->hasMany('Models\Parentpaid');
        }
public function Receit()
        {
            return $this->belongsTo('Models\receit');
        }
}