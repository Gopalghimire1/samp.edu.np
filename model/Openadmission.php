<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Openadmission extends Eloquent
{
    protected $fillable = [
        'id',
        'title',
        "types",
        "subject",
        "enabled",
        "ay",
        "message",
        'created_at', 'updated_at'
    ];

    public function listCount(){
        return Admission::where('openadmission_id',$this->id)->count();
    }
    public function activeCount(){
        return Admission::where('openadmission_id',$this->id)->where('status',1)->count();
    }
    public function pendingCount(){
        return Admission::where('openadmission_id',$this->id)->where('status',0)->count();
    }
    public function cancelCount(){
        return Admission::where('openadmission_id',$this->id)->where('status',2)->count();
    }
}
