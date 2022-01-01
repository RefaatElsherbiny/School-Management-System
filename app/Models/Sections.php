<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sections extends Model
{
    //

    use HasTranslations;

    public $translatable = ['name_sections'];

    protected $fillable = [

        "name_sections" , "grade_id",
        "grade_id" ,"status","class_id",

    ];

    protected $table = 'create_sections';

    public $timestamp = true;



    public function My_classs()
    {
        return $this->belongsTo('App\Models\class_room', 'class_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\teachers','teacher_section');
    }

}
