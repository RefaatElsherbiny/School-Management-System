<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Students extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];


    public function gender()
    {
        return $this->belongsTo('App\gender', 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\grades', 'Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo('App\Models\class_room', 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }
    //relationShip one To many
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }


    public function Nationality()
    {
        return $this->belongsTo('App\Models\Type_nationalite', 'nationalitie_id');
    }

    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }

    public function student_account()
    {
        return $this->hasMany('App\Models\student_account', 'student_id');

    }
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendances', 'student_id');
    }

}
