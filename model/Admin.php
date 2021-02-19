<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Admin extends Eloquent{ 
            protected $fillable = ['id','username','password','role','created_at','updated_at',];
}