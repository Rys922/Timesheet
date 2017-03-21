<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $table = 'projects';

    public function manager()
    {
        return $this->belongsTo('App\User','manager_id');
    }

    public function workers()
    {
        return $this->belongsToMany('App\User', 'project_user', 'user_id', 'project_id');
    }
}
