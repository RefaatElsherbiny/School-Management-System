<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizzes extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    public function teacher()
    {
        return $this->belongsTo('App\teachers', 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subjects', 'subject_id');
    }


    public function grade()
    {
        return $this->belongsTo('App\Models\grades', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\class_room', 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }


}
