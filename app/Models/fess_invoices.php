<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fess_invoices extends Model
{
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

    public function student()
    {
        return $this->belongsTo('App\Students', 'student_id');
    }

    public function fees()
    {
        return $this->belongsTo('App\Models\Fess', 'fee_id');
    }}
