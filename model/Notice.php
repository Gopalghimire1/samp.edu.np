<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Notice extends Eloquent{ 
            protected $fillable = ['id','title','publisher','published','description','created_at','updated_at',];
            
            public function getdate(){
              $published=$this->published;
              $date=new \Carbon\Carbon($published);
              return $date;
              // return \Carbon\Carbon::createFromFormat('d/m/Y', $this->eventdate);
            }
}