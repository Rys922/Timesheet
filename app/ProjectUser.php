<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
     protected $table = 'project_user';
     protected $fillable=['user_id', 'project_id'];
     public $timestamps = false;
    public function worker()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project','project_id');
    }
}
