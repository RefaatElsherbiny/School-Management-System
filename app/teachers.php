<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class teachers extends Model
{
    //


    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];

public function genders()
{
    return $this->belongsTo('App\gender', 'Gender_id');

}

public function specializations ()
{
   return $this->belongsTo('App\specializations' , 'Specialization_id');

}



public function Sections()
{
    return $this->belongsToMany('App\Models\Sections','teacher_section');
}


}

