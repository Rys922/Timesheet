<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable=['content', 'time', 'workday','user_id','task_id'];

    const stan = ['Zaakceptowany', 'Oczekuje', 'Odrzucony'];

    public function task()
    {
        return $this->belongsTo('App\Task','task_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
