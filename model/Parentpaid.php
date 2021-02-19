<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Parentpaid extends Eloquent{ 
            protected $fillable = ['id','studentparent_id','date','paid','created_at','updated_at','parentfee_id',];
public function studentparent()
        {
            return $this->belongsTo('Models\Studentparent');
        }
public function parentfee()
        {
            return $this->belongsTo('Models\Parentfee');
        }
}