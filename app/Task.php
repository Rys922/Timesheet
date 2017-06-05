<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $table = 'tasks';

    public function workers()
    {
        return $this->belongsToMany('App\User', 'task_user', 'user_id', 'task_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','task_id');
    }

    public function acceptedComments()
    {
        return $this->hasMany('App\Comment','task_id')->where('stan','=','Zaakceptowany');
    }
}
