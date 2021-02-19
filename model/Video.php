<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Video extends Eloquent{ 
              protected $table='video';
            protected $fillable = ['id','link','image','created_at','updated_at',];

         
}