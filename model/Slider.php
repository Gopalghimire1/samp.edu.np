<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Slider extends Eloquent{ 
            protected $fillable = ['id','image','link','caption','subcaption','button','created_at','updated_at',];
}