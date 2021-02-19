<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Fee extends Eloquent{ 
            protected $fillable = ['id','title','publisher','date','examtype','file','created_at','updated_at',];

}