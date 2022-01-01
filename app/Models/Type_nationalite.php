<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Model;

class Type_nationalite extends Model
{
    //
    
    use HasTranslations;

    public $translatable = ['name_nationality'];

    protected $fillable = ["name_nationality"];

    protected $table = 'type_nationalites';

    public $timestamp = true;

}
