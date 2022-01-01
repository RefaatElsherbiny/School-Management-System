<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class class_room extends Model
{
    //

    use HasTranslations;

    public $translatable = ['name_class'];


    protected $table = 'class_room';
    public $timestamps = true;
    protected $fillable=['name_class','Grade_id'];


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف

    public function Grades()
    {
        return $this->belongsTo('App\Models\grades', 'Grade_id');
    }




}
