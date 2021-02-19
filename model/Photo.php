<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Photo extends Eloquent{ 
            protected $fillable = ['id','galary_id','filepath','created_at','updated_at',];
public function galary()
        {
            return $this->belongsTo('Models\Galary');
        }
}