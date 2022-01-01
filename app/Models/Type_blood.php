<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_blood extends Model
{
    //

    protected $fillable = ["name_blood"];

    protected $table = 'type_bloods';

    public $timestamp = true;

}
