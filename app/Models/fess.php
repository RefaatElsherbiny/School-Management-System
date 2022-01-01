<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class fess extends Model
{

    use HasTranslations;

    public $translatable = ['title'];
    protected $fillable=['title','amount','Grade_id','Classroom_id','year','description','Fee_type'];

  // relation_ship....

  public function grade()
  {
      return $this->belongsTo('App\Models\grades', 'Grade_id');
  }


  // علاقة بين الصفوف الدراسية والرسوم الدراسية لجب اسم الصف

  public function classroom()
  {
      return $this->belongsTo('App\Models\class_room', 'Classroom_id');
  }
}
