<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processing_fess extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Students', 'student_id');
    }
}
