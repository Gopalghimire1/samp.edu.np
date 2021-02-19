<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Studentparent extends Eloquent{ 
            protected $fillable = ['id','name','adress','phone','password','email','isarchived','created_at','updated_at',];
public function Studentparentinboxes()
        {
            return $this->hasMany('Models\Studentparentinbox');
        }
public function Students()
        {
            return $this->hasMany('Models\Student');
        }
        public function Parentfees()
        {
            return $this->hasMany('Models\Parentfee');
        }
public function Parentpaids()
        {
            return $this->hasMany('Models\Parentpaid');
        }
}