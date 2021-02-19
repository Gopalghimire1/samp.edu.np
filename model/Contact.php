<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Contact extends Eloquent{ 
            protected $fillable = ['id','firstname','lastname','address','phone','email','message','created_at','updated_at',];
}