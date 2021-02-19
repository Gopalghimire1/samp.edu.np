<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Receititem extends Eloquent{ 
            protected $fillable = ['id','receit_id','particular','rate','qty','total','discount','remarks','created_at','updated_at',];
public function receit()
        {
            return $this->belongsTo('Models\Receit');
        }
}