<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Page extends Eloquent{ 
            protected $fillable = ['id','title','image','body','type','created_at','updated_at',];

}