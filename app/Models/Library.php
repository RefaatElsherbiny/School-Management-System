<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table="libraries";

    public function grade()
    {
        return $this->belongsTo('App\Models\grades', 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\class_room', 'Classroom_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\teachers', 'teacher_id');
    }

}
