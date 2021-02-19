<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Studentlist extends Eloquent{ 
            protected $fillable = ['id','title','file','created_at','updated_at'];
}