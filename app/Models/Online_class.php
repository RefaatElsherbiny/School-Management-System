<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Online_class extends Model
{
    public $fillable= ['integration','Grade_id','Classroom_id','section_id',
    'user_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];
    public function grade()
    {
        return $this->belongsTo('App\Models\grades', 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\class_room', 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
