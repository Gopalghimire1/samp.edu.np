<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Popup extends Eloquent{ 
            protected $fillable = ['id','status','image','body','created_at','updated_at'];

}