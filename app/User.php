<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','role','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function manageProjects()
    {
        return $this->hasMany('App\Project','manager_id');
    }

    public function workProjects()
    {
        return $this->belongsToMany('App\Project', 'project_user', 'project_id', 'user_id');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Task', 'task_user', 'user_id', 'task_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message','receiver_id');
    }
}
