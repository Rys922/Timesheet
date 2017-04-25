<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $table = 'tasks';

    public function workers()
    {
        return $this->belongsToMany('App\User', 'project_user', 'user_id', 'project_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
