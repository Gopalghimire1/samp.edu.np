<?php
         namespace Models;
         use Carbon\Carbon;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Event extends Eloquent{ 
            protected $fillable = ['id','title','description','eventtime','eventdate','adress','created_at','updated_at','photo'];
            public function getdate(){
              $eventdate=$this->eventdate;
              $date=new \Carbon\Carbon($eventdate);
              return $date;
              // return \Carbon\Carbon::createFromFormat('d/m/Y', $this->eventdate);
            }
          }