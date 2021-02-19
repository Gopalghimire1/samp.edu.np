<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Studentupload extends Eloquent
{
    protected $fillable = [
        'id',
        'student_id',
        "title",
        "remark",
        "verified_by",
        "verified_phone",
        "file",
        'created_at',
        'updated_at',
    ];
}
