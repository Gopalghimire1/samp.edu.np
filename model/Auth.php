<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Auth extends Eloquent{ 
            protected $fillable = ['id','role','session_key','refrence_id','created_at','updated_at',];
}