<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Studentparentinbox extends Eloquent{ 
            protected $fillable = ['id','studentparent_id','message','hasread','created_at','updated_at',];
public function studentparent()
        {
            return $this->belongsTo('Models\Studentparent');
        }
}