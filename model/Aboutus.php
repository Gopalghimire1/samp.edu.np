<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Aboutus extends Eloquent{ 
              protected $table='aboutus';
            protected $fillable = ['id','page','created_at','updated_at',];

         
}