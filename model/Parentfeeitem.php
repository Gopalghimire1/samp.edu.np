<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Parentfeeitem extends Eloquent{ 
            protected $fillable = ['id','parentfee_id','particular','rate','qty','total','discount','remarks','created_at','updated_at',];
public function parentfee()
        {
            return $this->belongsTo('Models\Parentfee');
        }
}