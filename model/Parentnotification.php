<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Parentnotification extends Eloquent{ 
            protected $fillable = ['id','authkey','parent_id','updated_at','created_at',];
public function parent()
        {
            return $this->belongsTo('Models\Parent');
        }
}