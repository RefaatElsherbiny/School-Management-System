<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $guarded=[];


    public function student()
    {
        return $this->belongsTo('App\Students', 'student_id');
    }

    public function f_grade()
    {
         return $this->belongsTo('App\Models\grades' , 'from_grade');
    }

    public function f_classroom()
    {
         return $this->belongsTo('App\Models\class_room' , 'from_Classroom');
    }
    public function f_section()
    {
         return $this->belongsTo('App\Models\Sections' , 'from_section');
    }
    public function t_grade()
    {
         return $this->belongsTo('App\Models\grades' , 'to_grade');
    }
    public function t_classroom()
    {
         return $this->belongsTo('App\Models\class_room' , 'to_Classroom');
    }
    public function t_section()
    {
         return $this->belongsTo('App\Models\Sections' , 'to_section');
    }



}
