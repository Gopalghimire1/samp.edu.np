<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Galary extends Eloquent{ 
            protected $fillable = ['id','title','description','created_at','updated_at',];
public function Photos()
        {
            return \Models\Photo::where('galary_id',$this->id)->count();
        }
        public function getPhotos()
        {
            return \Models\Photo::where('galary_id',$this->id)->get();
        }
}