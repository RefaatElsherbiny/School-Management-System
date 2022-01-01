<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class receipt_student extends Model
{
    protected $table = 'receipt_students';
    protected $guarded=[];

    public function student()
    {
        return $this->belongsTo('App\Students', 'student_id');
    }
}
