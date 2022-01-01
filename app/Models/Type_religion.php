<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Type_religion extends Model
{
    use HasTranslations;

    public $translatable = ['name_religion'];

    protected $fillable = ["name_religion"];

    protected $table = 'type_religions';

    public $timestamp = true;}
