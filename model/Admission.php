<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Admission extends Eloquent
{
  protected $fillable = [
    'id',
    "status",
    "type",
    "student_id",
    "voucher",
    "openadmission_id",
    "verifiedby",
    "subject",
    "title",
    'created_at',
    'updated_at',
  ];

  public function student(){
    return $this->belongsTo('\Models\Student');
  }
}
