<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parent_Attachment extends Model
{
    protected $fillable=['file_name','parent_id'];
    protected $table = 'parent__attachments';

}
