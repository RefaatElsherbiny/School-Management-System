<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{



    public function quizze () {

        return $this->belongsTo('App\Models\Quizzes' , 'quizze_id');
    }
}
