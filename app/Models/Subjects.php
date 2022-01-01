<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subjects extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name','grade_id','classroom_id','teacher_id'];

    public function grade()
    {
        return $this->belongsTo('App\Models\grades', 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo('App\Models\class_room', 'classroom_id');

    } public function teacher()
    {
        return $this->belongsTo('App\teachers', 'teacher_id');
    }


}
