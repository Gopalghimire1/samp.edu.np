<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Download extends Eloquent{ 
            protected $fillable = ['id','title','date','detail','file','created_at','updated_at',];
}