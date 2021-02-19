<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Subject extends Eloquent{ 
            protected $fillable = ['id','level_id','name','created_at','updated_at',];
public function level()
        {
            return $this->belongsTo('Models\Level');
        }
}