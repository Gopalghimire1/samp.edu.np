<?php
         namespace Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Billitem extends Eloquent{ 
            protected $fillable = ['id','ptr','rate','qty','fee_id','bill_id','created_at','updated_at',];



    public function student()
        {
            return $this->belongsTo('Models\Student');
        }

    public function level()
      {
        return $this->belongsTo('Models\Level');
       }

    public function fee()
       {
           return $this->belongsTo('Models\Fee');
       }

    public function bill()
       {
           return $this->belongsTo('Models\Bill');
       }
}