<?php
         namespace Models;
         use Carbon\Carbon;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class News extends Eloquent{ 
            protected $fillable = ['id','title','publisher','published','news','created_at','updated_at','photo'];
            public function getdate(){
              $published=$this->published;
              $date=new \Carbon\Carbon($published);
              return $date;
              // return \Carbon\Carbon::createFromFormat('d/m/Y', $this->eventdate);
            }
}