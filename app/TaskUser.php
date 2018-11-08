<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    //
     public $table = "task_user";

    protected $fillable = [
      'task_id',
      'user_id',
    ];
}
