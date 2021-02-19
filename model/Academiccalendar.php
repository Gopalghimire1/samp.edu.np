<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Academiccalendar extends Eloquent{ 
            protected $fillable = ['id','date','name','multiday','start','end','isholiday','created_at','updated_at',];

            public function totalDays(){
              $start=new \Carbon\Carbon($this->start);
              $end=new \Carbon\Carbon($this->end);
              return $end->diffInDays($start);
            }
}