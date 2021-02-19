<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Receit extends Eloquent{ 
            protected $fillable = ['id','title','issuedate','totalamount','created_at','updated_at',];
public function Receititems()
        {
            return $this->hasMany('Models\Receititem');
        }
        public function parentfees()
        {
            return $this->hasMany('Models\Parentfee');
        }
}