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

    public function comments()
    {
        return $this->hasMany('App\Comment','user_id');
    }
    public function unconfirmedComments(){
        $comment = \App\Comment::       
        join('tasks', 'comments.task_id', '=', 'tasks.id')->
        join('projects', 'tasks.project_id', '=', 'projects.id')->
        where('projects.manager_id','=',$this->id)->
        where('comments.stan','=','Oczekuje')->select('comments.*')->get();
        return $comment;
    }
}
