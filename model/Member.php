<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Member extends Eloquent{ 
            protected $fillable = ['id','name','desig','image','created_at','updated_at',];

}