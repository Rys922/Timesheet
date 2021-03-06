<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $table = 'projects';
     protected $fillable=['name', 'description', 'manager_id'];

    public function manager()
    {
        return $this->belongsTo('App\User','manager_id');
    }

    public function workers()
    {
        return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id')->withPivot('id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
