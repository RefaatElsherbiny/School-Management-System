<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class grades extends Model
{
    //
    use HasTranslations;

    public $translatable = ['name_grades' , 'note_grades'];
    protected $fillable = ["name_grades" , "note_grades"];

    protected $table = 'grades';

    public $timestamp = true;

    public function Sections()
    {
        return $this->hasMany('App\Models\Sections' , 'grade_id');
    }
}
